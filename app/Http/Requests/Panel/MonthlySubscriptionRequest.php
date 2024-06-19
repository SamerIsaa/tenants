<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class MonthlySubscriptionRequest extends FormRequest
{

    public function authorize()
    {
//        return auth('admin')->user()->can('add_category');
        return true;
    }


    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'monthly_installment' => 'required|numeric|min:0|not_in:0',
            'started_at' => 'required|date',
            'ended_at' => 'nullable|date',
        ];
    }


}
