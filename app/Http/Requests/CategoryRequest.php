<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Elnooronline\LaravelConcerns\Http\Requests\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', Category::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('category'));
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->parseLocaled([
            'name:{default}' => 'required|max:255',
            'name:{lang}' => 'nullable|max:255',
        ]);
    }
}
