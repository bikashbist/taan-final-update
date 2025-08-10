<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Faq extends DM_BaseModel
{
    use HasFactory;
    public $fillable = ['question', 'answer'];


    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }

    public function getRules()
    {
        $rules = array(
            'addmore.*.question' => 'required',
            'addmore.*.answer' => 'required',
        );
        return $rules;
    }

    public function editRules()
    {
        $rules = array(
            'question' => 'required',
            'answer'   => 'required',
        );
        return $rules;
    }

    public function storeData(Request $request, $addmore, $rows)
    {
        $faq =                    new Faq;
                                foreach ($request->addmore as $key => $value) {
                                    Faq::create($value);
                                }
        return true;
    }

    public function updateData(Request $request, $id, $question, $answer,  $status, $rows)
    {
        $faq                             = Faq::findOrFail($id);
        $faq->question                   = $question;
        $faq->answer                     = $answer;
        $faq->status                     = $status;
        $faq->save();
        return true;
    }
}
