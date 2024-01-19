<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id'  => 'required',
            'title'        => 'required',
            'description'  => 'required',
            'ingredients'  => 'required',
            'instructions' => 'required',
            'image'        => 'required|mimes:png',
            'tags'         => 'required',
        ];
    }
}
