<?php

namespace App\Http\Requests;

use Elnooronline\LaravelConcerns\Http\Requests\FormRequest;

class FeedbackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'max:255'],
            'message' => ['required', 'string'],
        ];
    }
}
