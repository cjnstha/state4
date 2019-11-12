<?php

namespace App\Http\Requests\Backend\ChecklistMgmt;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class EditChecklistMgmtRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can('edit_checklistmgmts');
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
