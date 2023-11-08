<?php

namespace App\Http\Requests;

class UpdatePostRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'content' => 'required',
            'category_id' => 'required|integer',
            'is_published' => 'nullable|boolean',
        ];
    }
}
