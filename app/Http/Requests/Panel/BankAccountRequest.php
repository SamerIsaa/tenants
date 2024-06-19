<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'owner_name'  => 'required|string|max:255',
            'number'  => 'required|string',
            'iban'  => 'required|string',
            'soft'  => 'required|string',
        ];
        foreach (locales() as $key => $language) {
            $rules['bank_name_' . $key] = 'required|string|max:255';
        }
        return $rules;
    }
}
