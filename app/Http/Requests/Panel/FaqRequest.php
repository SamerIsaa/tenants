<?php

namespace App\Http\Requests\Panel;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FaqRequest extends FormRequest
{

    public function authorize()
    {
        return auth('admin')->user()->can('manage_faq');
    }


    public function rules()
    {
        $rules['faq_category_id'] = 'required|exists:faq_categories,id';
        foreach (locales() as $category => $language) {
            $rules['title_'.$category] = 'required|string|max:255';
            $rules['description_'.$category] = 'required|string';
        }
        return  $rules;
    }


    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'status' => StatusCodes::UNAUTHORIZED,
            'message' => __('messages.dont_have_permission')
        ], StatusCodes::UNAUTHORIZED));
    }
}
