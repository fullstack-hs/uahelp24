<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'fnamesname' => 'required|unique:users,fnamesname,'.$this->user->id,
            'isAdmin' => 'sometimes',
            'password' => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable|same:password'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
