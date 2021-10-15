<?php

namespace App\Http\Requests\Dashbaord;

use Illuminate\Foundation\Http\FormRequest;

class EductionRequest extends FormRequest
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
            'user_id' => 'required',
            'qualification' => 'required',
            'grade_date' => 'required',
            'grade' => 'required',
            'ar_university' => 'required',
            'university' => 'required',
            'special_id' => 'required'
        ];
    }
}
