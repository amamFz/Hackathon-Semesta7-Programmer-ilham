<?php

namespace App\Http\Requests\Complain;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplainRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'lokasi_unit' => 'required|string|max:255',
            'comment' => 'nullable|string'
            // 'status' => 'required|open,in_progress,closed',
            // 'category_id' => 'required|exists:categories,id',
            // 'user_id' => 'required|exists:users,id',
        ];
    }
}
