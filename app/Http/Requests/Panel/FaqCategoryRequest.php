<?php

namespace App\Http\Requests\Panel;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FaqCategoryRequest extends FormRequest
{

    public function authorize()
    {
        $this->id = $this->route('id');
        return auth('admin')->user()->can('manage_faq');
    }


    public function rules()
    {
        foreach (locales() as $category => $language) {
            $rules['name_'.$category] = 'required|string|max:255';
        }
        return  $rules;
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::VALIDATION_ERROR,
            'message' => $validator->errors()->first()
        ], StatusCodes::VALIDATION_ERROR));
    }


    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::UNAUTHORIZED,
            'message' => __('messages.dont_have_permission')
        ], StatusCodes::UNAUTHORIZED));
    }
}
