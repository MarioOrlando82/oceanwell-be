<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'article_category_id' => 'required|integer|exists:article_categories,id',
            'content' => 'required|string',
        ];
    }
}
