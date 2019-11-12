<?php

namespace App\Http\Requests\Backend\CurrencyMgmt;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateCurrencyMgmtRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('add_currencymgmts');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
