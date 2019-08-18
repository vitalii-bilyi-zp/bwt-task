<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReview extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|string|email|max:255',
            'message' => 'required|string|max:500',
        ];
    }
}
