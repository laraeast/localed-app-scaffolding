<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\WithHashedPassword;
use App\Models\User;
use Elnooronline\LaravelConcerns\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Gate;

class UserRequest extends FormRequest
{
    use WithHashedPassword;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', User::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('user'));
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
        return $this->getAproperRules();
    }

    /**
     * Return the rules of create request.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Return the rules of update request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'name'     => ['sometimes', 'required', 'string', 'max:255'],
            'email'    => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:users,id,'.$this->route('user')->id],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
        ];
    }
}
