<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
            'status' => 'required',
        ];
    }
}
