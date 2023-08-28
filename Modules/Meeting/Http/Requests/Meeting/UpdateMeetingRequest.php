<?php

namespace Modules\Meeting\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
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
            "country_id" => ["required"],
            "place" => ["required"],
            "subject" => ["required"],
            "reason" => ["required"],
            "observation" => ["required"],
            
        ];
    }
}
