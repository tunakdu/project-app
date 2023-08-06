<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FreezerProductRequest extends FormRequest
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
            'freezer_id' => 'required|exists:freezers,id',
            'product_id' => 'required|exists:products,id',
            'type' => 'sometimes|in:gram,adet',
            'unit' => 'sometimes|integer',
        ];
    }

    public function messages()
    {
        return [
            'freezer_id.required' => 'Buzdolabı Kimlik bilgisi zorunludur!',
            'product_id.required' => 'Ürün Kimlik bilgisi zorunludur!',
        ];
    }
}
