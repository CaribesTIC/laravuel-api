<?php

namespace Modules\Meeting\Http\Requests\Attende;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAttendeRequest extends FormRequest
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
            'idcard' => ["required"],             
            'fullname' => ["required"],             
            'entity_id' => ["required"],             
            'dependence_id' => ["required"],             
            'position_id' => ["required"],             
            'email' => ["required"],             
            'phone' => ["required"],             
            'observation' => ["required"]             
        ];
    }
}
