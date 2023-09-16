<?php

namespace Modules\Meeting\Http\Requests\Agreement;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAgreementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): Bool
    {
        return true; //auth()->user()->role->name === "admin";
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): Array
    {
        return  [
            'meeting_id' => ["required"],             
            'agreement' => ["required"],             
            'responsible' => ["required"]            
            'observation' => ["required"]             
        ];
    }
}
