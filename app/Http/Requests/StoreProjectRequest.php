<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'type_id' => 'required|exists:types,id',
            'title' => 'required|string|unique:Projects|min:3|max:255',
            'description' => 'required|min:50|max:300|string',
            'image_url' => 'required|image',
            'technologies' => 'required|array|exists:technologies,id',


        ];
    }
}
