<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class PaymentLogRequest extends FormRequest
{

    public function authorize()
    {
//        return auth('admin')->user()->can('add_category');
        return true;
    }


    public function rules()
    {
        return [
            'user_id' => 'required_if:type,income|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0|not_in:0',
            'type' => 'required|in:income,expense',
        ];
    }


}
