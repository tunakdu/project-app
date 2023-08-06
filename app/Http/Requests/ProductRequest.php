<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'image_url' => 'sometimes|string',
            'type' => 'sometimes|in:adet,miktar',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ürün adı zorunludur!',
            'name.max' => 'Ürün adı en fazla :max karakter olmalıdır.',
            'image_url.required' => 'Resim alanı zorunludur!',
            'type.required' => 'Ürün tipi zorunludur!',
            'type.in' => 'Geçersiz ürün tipi.',
        ];
    }
}
