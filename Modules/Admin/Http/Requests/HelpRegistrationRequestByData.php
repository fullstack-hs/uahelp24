<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelpRegistrationRequestByData extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phoneNumber'=>'required|numeric|regex:/^0\d{9}$/|unique:refugeers,phoneNumber',
            'firstName'=>'required|alpha|min:2|max:20',
            'lastName'=>'required|alpha|min:2|max:20',
            'secondName'=>'sometimes|alpha|min:2|max:20',
            'email'=>'nullable|email|unique:refugeers,email',
            'region'=>'required|string|min:2|max:20',
            'district'=>'required|string|min:2|max:20',
            'city'=>'required|string|min:2|max:20',
            'temporaryAddress'=>'sometimes|string|min:2|max:300',
            'adults'=>'sometimes|integer',
            'childs'=>'sometimes|integer',
            'disabledPersons'=>'sometimes|integer',
            'pregnantPersons'=>'sometimes|integer',
            'socialNetworks'=>'sometimes|min:0|max:300',
            'dataVerified'=>'required'
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
