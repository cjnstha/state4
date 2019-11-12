<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function seeUser()
    {
        echo "This is a test"
        exit();
    }
}
