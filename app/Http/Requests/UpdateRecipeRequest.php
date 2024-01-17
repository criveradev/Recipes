<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id'  => 'required',
            'user_id'      => 'required',
            'title'        => 'required',
            'description'  => 'required',
            'ingredients'  => 'required',
            'instructions' => 'required'
        ];
    }
}
