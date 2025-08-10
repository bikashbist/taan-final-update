<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\Setting;
use App\Models\User;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\VerifyDocument;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;


class MemberController extends DM_BaseController
{
    protected $panel = 'Member';

    protected $base_route = 'admin.member';
    protected $view_path = 'admin.member';
    protected $model;
    protected $table;
    protected $contact_email;


    public function __construct(Member $model, Setting $setting)
    {
        $this->model = $model;
        $this->contact_email = $setting::pluck('site_email')->first();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Join with payments to get payment information
            $query = $this->model::query()
                ->leftJoin('payments', function ($join) {
                    $join->on('members.id', '=', 'payments.member_u_id')
                        ->whereRaw('payments.id = (SELECT MAX(id) FROM payments WHERE member_u_id = members.id)');
                })
                ->select('members.*', 'payments.end_date as payment_end_date', 'payments.status as payment_status')
                ->orderBy('members.id', 'ASC');

            // Apply filters
            if ($request->user_id) {
                $query->where('members.user_id', 'like', "%{$request->user_id}%");
            }
            if ($request->organization_name) {
                $query->where('members.organization_name', 'like', "%{$request->organization_name}%");
            }
            if ($request->member_type_id) {
                $query->where('members.member_type_id', 'like', "{$request->member_type_id}");
            }
            if ($request->member_id) {
                $query->where('members.member_id', 'like', "%{$request->member_id}%");
            }
            if ($request->mobile) {
                $query->where('members.mobile', 'like', "%{$request->mobile}%");
            }

            // Filter by renewal status (using Nepali date comparison)
            if ($request->renewal_status) {
                $currentNepaliDate = $this->getCurrentNepaliDate();
                if ($request->renewal_status == 'expired') {
                    $query->where('payments.end_date', '<', $currentNepaliDate);
                } elseif ($request->renewal_status == 'active') {
                    $query->where('payments.end_date', '>=', $currentNepaliDate);
                } elseif ($request->renewal_status == 'no_payment') {
                    $query->whereNull('payments.end_date');
                }
            }
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('member_type_id', function ($row) {
                    return $row->memberType->title;
                })
                ->addColumn('user_id', function ($row) {
                    return $row->getUserName->name;
                })
                ->addColumn('payment_end_date', function ($row) {
                    if ($row->payment_end_date) {
                        return date('Y-m-d', strtotime($row->payment_end_date));
                    }
                    return '<span class="badge badge-secondary">No Payment</span>';
                })
                ->addColumn('renewal_status', function ($row) {
                    if (!$row->payment_end_date) {
                        return '<span class="badge badge-secondary">No Payment</span>
                                <br><button class="btn btn-sm btn-info mt-1 renew-payment-btn"
                                        data-member-id="' . $row->id . '"
                                        data-member-name="' . $row->organization_name . '">
                                    <i class="fa fa-plus"></i> Add Payment
                                </button>';
                    }

                    $currentNepaliDate = $this->getCurrentNepaliDate();
                    $endDate = $row->payment_end_date;

                    if ($endDate < $currentNepaliDate) {
                        return '<span class="badge badge-danger">Expired</span>
                                <br><button class="btn btn-sm btn-warning mt-1 renew-payment-btn"
                                        data-member-id="' . $row->id . '"
                                        data-member-name="' . $row->organization_name . '"
                                        data-expired-date="' . $endDate . '">
                                    <i class="fa fa-refresh"></i> Renew Payment
                                </button>';
                    } elseif ($endDate >= $currentNepaliDate) {
                        // Calculate days left using simple string comparison for now
                        $currentParts = explode('-', $currentNepaliDate);
                        $endParts = explode('-', $endDate);

                        // Simple estimation - convert to comparable format
                        $currentNum = ($currentParts[0] * 365) + ($currentParts[1] * 30) + $currentParts[2];
                        $endNum = ($endParts[0] * 365) + ($endParts[1] * 30) + $endParts[2];
                        $daysLeft = $endNum - $currentNum;

                        if ($daysLeft <= 30 && $daysLeft > 0) {
                            return '<span class="badge badge-warning">Expiring Soon (' . $daysLeft . ' days)</span>
                                    <br><button class="btn btn-sm btn-primary mt-1 renew-payment-btn"
                                            data-member-id="' . $row->id . '"
                                            data-member-name="' . $row->organization_name . '"
                                            data-expiry-date="' . $endDate . '">
                                        <i class="fa fa-clock-o"></i> Renew Early
                                    </button>';
                        }
                        return '<span class="badge badge-success">Active</span>';
                    }
                    return '<span class="badge badge-secondary">Unknown</span>';
                })
                ->addColumn('action', function ($row) {
                    return '
                    <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-warning btn-xs"><i class="fa fa-pencil font-14"></i></a>
                    ' . '<a href="' . route($this->base_route . '.show', $row->id) . '" class="btn btn-success btn-xs"><i class="fa fa-info-circle font-14"></i></a> ' . '<a href="' . route($this->base_route . '.certificate', $row->id) . '" class="btn btn-info btn-xs"><i class="fa fa-certificate font-14"></i></a>.' . '<a href="' . route($this->base_route . '.payment-list', $row->id) . '" class="btn btn-secondary btn-xs"><i class="fa fa-money font-14"></i></a>. ' . '<a href="' . route($this->base_route . '.document', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-dark btn-xs "><i class="fa fa-file-word-o font-14"></i></a>
                    ';
                })
                ->rawColumns(['action', 'member_type_id', 'user_id', 'payment_end_date', 'renewal_status'])
                ->make(true);
        }
        $data['user'] = User::where('status', 'active')->select('id', 'name')->get();
        $data['type'] = MemberType::where('status', '1')->select('id', 'title')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['type']  = MemberType::where('status', '1')->select('id', 'title', 'has_subcategory')->get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function store(Request $request)
    {
        // Check if member type has subcategories and validate accordingly
        $memberType = MemberType::find($request->member_type_id);

        $validationRules = $this->model->getRules();

        // If member type has subcategories, make subcategory required
        if ($memberType && $memberType->has_subcategory) {
            $validationRules['member_subcategory_id'] = 'required|exists:member_subcategories,id';
        }

        $request->validate($validationRules);

        if ($this->model->storeData(
            $request,
            $request->full_name,
            $request->organization_name,
            $request->member_id,
            $request->member_type_id,
            $request->member_subcategory_id,
            $request->email,
            $request->register_no,
            $request->pan_vat_no,
            $request->address,
            $request->country,
            $request->website,
            $request->telephone,
            $request->mobile,
            $request->fax,
            $request->po_box,
            $request->key_person,
            $request->establish_date,
            $request->facebook,
            $request->twitter,
            $request->linkedin,
            $request->youtube,
            $request->instagram,
            $request->avatar,
            $request->company_cover_image,
            $request->company_logo,
            $request->company_pan,
            $request->company_register,
            $request->company_tax_clearance,
            $request->payment_slip,
            $request->about_company,
            $request->tourism_certificate,
            $request->nrb_certificate,
            $request->cottage_industry_certificate,
            $request->renewal_certificate
        )) {

            session()->flash('alert-success', 'Member Successfully Created !');
            return redirect()->route($this->base_route . '.index');
        } else {
            session()->flash('alert-danger', 'Member Creation Failed !');
            return redirect()->route($this->base_route . '.index');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['rows']              = Member::findorFail($id);
        $data['type']              = MemberType::where('status', '1')->select('id', 'title', 'has_subcategory')->get();
        $data['user']              = User::where('id', $data['rows']->user_id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        // Check if member type has subcategories and validate accordingly
        $memberType = MemberType::find($request->member_type_id);

        $validationRules = $this->model->getRules();

        // If member type has subcategories, make subcategory required
        if ($memberType && $memberType->has_subcategory) {
            $validationRules['member_subcategory_id'] = 'required|exists:member_subcategories,id';
        }

        $request->validate($validationRules);

        if ($this->model->updateData(
            $request,
            $id,
            $request->full_name,
            $request->organization_name,
            $request->member_id,
            $request->member_type_id,
            $request->member_subcategory_id,
            $request->email,
            $request->register_no,
            $request->pan_vat_no,
            $request->address,
            $request->country,
            $request->website,
            $request->telephone,
            $request->mobile,
            $request->fax,
            $request->po_box,
            $request->key_person,
            $request->establish_date,
            $request->facebook,
            $request->twitter,
            $request->linkedin,
            $request->youtube,
            $request->instagram,
            $request->avatar,
            $request->company_cover_image,
            $request->company_logo,
            $request->company_pan,
            $request->company_register,
            $request->company_tax_clearance,
            $request->payment_slip,
            $request->about_company,
            $request->tourism_certificate,
            $request->nrb_certificate,
            $request->cottage_industry_certificate,
            $request->renewal_certificate
        )) {
            session()->flash('alert-success', 'Member Successfully Updated !');
            return redirect()->route($this->base_route . '.index');
        } else {
            session()->flash('alert-danger', 'Member Update Failed !');
            return redirect()->route($this->base_route . '.index');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy($id)
    {
        Member::find($id)->delete();
        session()->flash('alert-success', 'Member  Successfully Deleted !');
        return response()->json('success');
    }

    public function status(Request $request)
    {
        try {
            $category = Member::findOrFail($request->user_id);
            $category->status = $request->status;
            $category->save();

            return response()->json(['success' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update status.']);
        }
    }

    public function show(Request $request, $id)
    {
        $data['single'] = Member::where('id', $id)->first();
        $data['type']              = MemberType::where('status', '1')->select('id', 'title', 'has_subcategory')->get();
        $data['user']              = User::where('id', $data['single']->user_id)->first();
        return view(parent::loadView($this->view_path . '.show'), compact('data'));
    }
    // Certificate
    public function Certificate(Request $request, $id)
    {
        $data['single']            = Member::where('id', $id)->first();
        $data['type']              = MemberType::where('status', '1')->select('id', 'title')->get();
        $data['user']              = User::where('id', $data['single']->user_id)->first();
        return view(parent::loadView($this->view_path . '.certificate'), compact('data'));
    }
    // Documnet
    public function Document(Request $request, $id)
    {
        $data['single'] = Member::where('id', $id)->select('member_id', 'user_id', 'company_pan', 'company_register', 'company_tax_clearance', 'tourism_certificate', 'nrb_certificate', 'cottage_industry_certificate', 'renewal_certificate')->first();
        $data['user']              = User::where('id', $data['single']->user_id)->first();
        return view(parent::loadView($this->view_path . '.document'), compact('data'));
    }
    // Send Email
    public function SendEmail(Request $request)
    {
        $Params = [
            '_token' => csrf_token(),
            'member_id' => $request->member_id,
        ];
        $url = url('/upload-voucher') . '?' . http_build_query($Params);
        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'url' => $url,
            'member_id' => $request->member_id,
        ];
        dd($url);
        Mail::send('front_end.emails.contact', $data, function ($message) use ($data) {
            $message->from($this->contact_email);
            $message->to($data['email']);
            $message->subject(env('MAIL_FROM_NAME') . ' - ' . 'Document Verified !');
        });
        // Sending Response To Sender
        Mail::send('front_end.emails.response', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to($this->contact_email);
            $message->subject(env('MAIL_FROM_NAME') . ' - ' . 'Document Verification Sent');
        });
        return redirect()->back()->with('alert-success', 'Email Sent Successfully !');
    }
    // Payment List
    public function PaymentList(Request $request, $id)
    {
        $data['payments'] = Payment::where('member_u_id', $id)->get();
        return view(parent::loadView($this->view_path . '.payment-list'), compact('data'));
    }

    // Send Renewal Reminder Email
    public function sendReminderEmail(Request $request)
    {
        try {
            $memberId = $request->member_id;
            $member = Member::with('getUserName')->find($memberId);

            if (!$member) {
                return response()->json(['error' => 'Member not found'], 404);
            }
            $Params = [
                '_token' => csrf_token(),
                'member_id' => $memberId,
            ];


            // Get latest payment information
            $latestPayment = Payment::where('member_u_id', $memberId)
                ->orderBy('id', 'desc')
                ->first();

            $currentNepaliDate = $this->getCurrentNepaliDate();

            // Determine email type based on payment status
            $emailType = 'no_payment';
            $expiredDate = null;

            if ($latestPayment && $latestPayment->end_date) {
                if ($latestPayment->end_date < $currentNepaliDate) {
                    $emailType = 'expired';
                    $expiredDate = $latestPayment->end_date;
                } else {
                    $emailType = 'expiring_soon';
                    $expiredDate = $latestPayment->end_date;
                }
            }
            $url = url('/upload-voucher') . '?' . http_build_query($Params);
            dd($url);

            $emailData = [
                'member_name' => $member->getUserName->name,
                'organization_name' => $member->organization_name,
                'member_id' => $member->member_id,
                'email_type' => $emailType,
                'expired_date' => $expiredDate,
                'current_date' => $currentNepaliDate,
                'renewal_url' => $url
            ];

            // Send email (you'll need to create the email template)
            \Mail::send('admin.emails.payment-reminder', $emailData, function ($message) use ($member) {
                $message->to($member->getUserName->email, $member->getUserName->name);
                $message->subject('TAAN Membership Payment Renewal Reminder');
            });

            return response()->json(['success' => 'Reminder email sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send reminder email'], 500);
        }
    }

    /**
     * Get current Nepali date in YYYY-MM-DD format
     */
    private function getCurrentNepaliDate()
    {
        $now = \Carbon\Carbon::now();
        $bsdate = new \Laratech\Bsdate\Bsdate();
        $nepaliDate = $bsdate->engToNep($now->year, $now->month, $now->day);

        // Convert Nepali Unicode numbers to English numbers
        $bsYear = $this->nepaliToEnglishNumber($nepaliDate['year']);
        $bsMonth = str_pad($this->nepaliToEnglishNumber($nepaliDate['month']), 2, '0', STR_PAD_LEFT);
        $bsDay = str_pad($this->nepaliToEnglishNumber($nepaliDate['date']), 2, '0', STR_PAD_LEFT);

        return "{$bsYear}-{$bsMonth}-{$bsDay}";
    }

    /**
     * Convert Nepali Unicode numbers to English numbers
     */
    private function nepaliToEnglishNumber($nepaliNumber)
    {
        $nepaliDigits = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($nepaliDigits, $englishDigits, $nepaliNumber);
    }

    /**
     * Calculate difference between two Nepali dates in days
     */
    private function calculateNepaliDateDifference($startDate, $endDate)
    {
        try {
            // Use existing helper function to convert Nepali dates to English
            $startEngDateStr = dateeng($startDate, true); // true for leading zeros
            $endEngDateStr = dateeng($endDate, true);

            // Calculate difference in days
            $startTimestamp = strtotime($startEngDateStr);
            $endTimestamp = strtotime($endEngDateStr);
            $daysDiff = ($endTimestamp - $startTimestamp) / (60 * 60 * 24);

            return ceil($daysDiff);
        } catch (\Exception $exception) {
            return 0; // Return 0 if calculation fails
        }
    }
}
