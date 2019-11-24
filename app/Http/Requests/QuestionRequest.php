<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class QuestionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'body' => 'required|between:10,40',
        ];
    }
}
