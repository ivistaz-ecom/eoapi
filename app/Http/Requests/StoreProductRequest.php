<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'chapter' => 'required',
            'region' => 'required',
            'joindt' => 'required',
            'industry' => 'required',
            'voucher_amt' => 'required',
            'spouse_id' => 'required',
            'gender' => 'required',
            'spouse_status' => 'required',
            'regstatus' => 'required'
        ];
    }
}
