<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        // dd($this->Category->id);
        return [
            'nmCategory' => ['required', 'max:30', 'unique:categories,nm_category,' . $this->Category->id]
            // 'nmCategory' => 'required|max:30|unique:categories,nm_category,' . $this->Category->id
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
