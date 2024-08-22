<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoryRequest extends FormRequest
{
    public function rules() : array
    {
        //dd($this->all());

        // валидация данных из фронта.
        // https://laravel.com/docs/11.x/validation#available-validation-rules
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:65535',
            'author_id' => 'required|integer|exists:authors,id',
            'image_path' => 'nullable|string|max:255',
        ];
    }
}
