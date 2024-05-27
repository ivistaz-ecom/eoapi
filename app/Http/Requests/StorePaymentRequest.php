<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'region' => 'required',
            'amount' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'companyaddr' => 'required',
            'symbol' => 'required',
            'currency' => 'required',
            'voucher' => 'required',
            'exprdt' => 'required',
            'spouseid' => 'required',
            'spousestatus' => 'required',
            'txnid' => 'required',
            'paymentstatus' => 'required',
            'memregstatus' => 'required'
        ];
    }
}
