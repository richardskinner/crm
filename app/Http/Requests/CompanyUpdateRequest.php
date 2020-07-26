<?php

namespace App\Http\Requests;

use App\Rules\Domain;
use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'name' => 'alpha_num_spaces',
            'email' => 'email',
            'website' => [new Domain()],
            'logo' => 'image:jpeg,png,gif,svg|dimensions:min_width=100,min_width=100'
        ];
    }
}
