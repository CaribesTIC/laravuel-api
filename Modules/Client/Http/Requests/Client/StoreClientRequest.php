<?php

namespace Modules\Client\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "email" => ["required"],
            "type" => ["required"],
            "identification_card" => ["required"],
            "business_name" => ["required"],
            "phone" => ["required"],
            "country_id" => ["required"],
            "domicile" => ["required"],
            
        ];
    }
}
