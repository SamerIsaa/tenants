<?php

namespace App\Http\Requests\Panel;

use App\Constants\StatusCodes;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoleRequest extends FormRequest
{
    protected $id;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->id = $this->route('id');
         return auth('admin')->user()->can('manage_roles');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:roles,name,' . $this->id,
        ];
    }

//
//    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json([
//            'status'    => false,
//            'msg' => $validator->errors()->first()
//        ], StatusCodes::VALIDATION_ERROR));
//    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'status'    => StatusCodes::UNAUTHORIZED,
            'message' => __('messages.dont_have_permission')
        ], StatusCodes::UNAUTHORIZED));
    }
}
