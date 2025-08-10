<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = [
        'user_id',
        'member_u_id',
        'member_id',
        'start_date',
        'end_date',
        'amount',
        'voucher',
        'status',
        'approved_date',
    ];
    public function getRules()
    {
        return [
            'user_id' => 'required',
            'member_u_id' => 'required',
            'member_id' => 'required',
            'amount' => 'required',
            'voucher' => 'required',
        ];
    }

    public function getOrganizationName()
    {
        return $this->hasOne('App\Models\Member', 'id', 'member_u_id');
    }
}
