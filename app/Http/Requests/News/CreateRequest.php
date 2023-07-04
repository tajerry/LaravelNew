<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'author' => 'required|string|min:3',
            'image' => 'nullable',
            'status' => 'required|string|min:5|max:7',
            'description' => 'required|string',
            'category_id' => 'required|integer|min:5'
        ];
    }
}
