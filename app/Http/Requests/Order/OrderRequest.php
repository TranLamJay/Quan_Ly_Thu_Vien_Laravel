<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => 'required',
            'user_email' => [
                'required',
                'email'
            ],
            'end_date' => [
                'required',
                'date'
            ],
            'form' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Tên không được để trống',
            'user_email.required' => 'Email không được để trống',
            'user_email.email' => 'Email không đúng định dạng',
            'end_date.required' => 'Ngày trả không được để trống',
            'end_date.date' => 'Ngày trả phải là ngày',
        ];
    }
}
