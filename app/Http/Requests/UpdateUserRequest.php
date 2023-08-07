<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|numeric|unique:users,phone,' . $this->id,
            'ssn' => 'required|numeric|unique:users,ssn,' . $this->id,
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => __('common.name'),
            'ssn' => __('common.ssn'),
            'phone' => __('common.phone'),
        ];
    }
}
