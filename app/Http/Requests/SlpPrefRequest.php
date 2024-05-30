<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlpPrefRequest extends FormRequest
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
            'slpid' => 'required',
            'flyingfrom' => 'required',
            'dietpref' => 'required',
            'allergies' => 'required',
            'shirtsize' => 'required',
            'interests' => 'required|array',
            'specialrequest' => 'required',
            'eoid' => 'required'
        ];
    }
}
