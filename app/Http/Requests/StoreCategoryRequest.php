<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'nmCategory' => ['required', 'unique:categories,nm_category', 'max:30']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Data Wajib Diisi',
            'unique' => 'Data sudah dipakai',
            'max' => 'Data harus kurang dari 30 huruf'
        ];
    }
}
