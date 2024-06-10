<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRieMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'eoid' => 'required',
            'gender' => 'required',
            'mobile' => 'required',
            'industry' => 'required',
            'company' => 'required',
            'spouseid' => 'required',
            'regstatus' => 'required',
            'addr1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'country' => 'required',
            'comaddr1' => 'required',
            'comcity' => 'required',
            'comstate' => 'required',
            'compin' => 'required',
            'comcountry' => 'required'
        ];
    }
}
