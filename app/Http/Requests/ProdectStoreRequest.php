<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdectStoreRequest extends FormRequest
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
        $imageRules = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];

        if ($this->isMethod('post')) {
            $imageRules[0] = 'required';
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'descripshin' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'image' => $imageRules,
        ];
    }
}
