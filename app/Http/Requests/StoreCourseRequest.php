<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','string'],
            'start_at' => ['required'],
            'end_at' => ['required', 'date', 'after_or_equal:start_at'],
            'hours' => ['required'],
            'users' => ['required','array'],
            'users.*' => ['integer','exists:users,id'],
        ];
    }
}
