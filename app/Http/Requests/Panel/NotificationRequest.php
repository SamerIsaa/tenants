<?php

namespace App\Http\Requests\Panel;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NotificationRequest extends FormRequest
{

    public function authorize()
    {
//        return auth('admin')->user()->can('add_category');
        return true;
    }


    public function rules()
    {
        $rules['user_id'] = 'required|array';
        $rules['user_id.*'] = 'required|exists:users,id';
        $rules['title'] = 'required|string|max:255';
        $rules['description'] = 'required|string';
        return  $rules;
    }

}
