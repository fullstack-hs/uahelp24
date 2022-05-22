<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpRegistrationRequestByPhone extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phoneNumber'=>'required|numeric|regex:/^0\d{9}$/|exists:refugeers,phoneNumber',
            'refugeerRequirements'=>'sometimes|min:0|max:500',
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
