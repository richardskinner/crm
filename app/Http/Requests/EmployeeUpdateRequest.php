<?php

namespace App\Http\Requests;

use App\Rules\UKPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => 'required|integer',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone' => [new UKPhoneNumber()],
            'email' => 'email',
        ];
    }
}
