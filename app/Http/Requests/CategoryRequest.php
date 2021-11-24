<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

        $rules = [
            'nameBn' => 'required|unique:categories,nameBn,'.$this->id.',id',
            'nameEn' => 'required|unique:categories,nameEn,'.$this->id.',id',
        ];

        if (!$this->has('img'))
         {
           $rules += ['img'    => 'required'];
        }

        return $rules;
    }
}
