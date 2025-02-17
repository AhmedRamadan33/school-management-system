<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarksRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'gpa' => 'required',
            'sum' => 'required',
            'science' => 'required',
            'social_studies' => 'required',
            'math' => 'required',
            'english' => 'required',
            'geography' => 'required',
            'physics' => 'required',
            'history' => 'required',
            'chemistry' => 'required',
            'biology' => 'required',
            'computer' => 'required',
            'arabic' => 'required',
            'french' => 'required',
            'german' => 'required',
            'religion' => 'required',
            'statistic' => 'required',
            'psychology' => 'required',
            'philosophy' => 'required',
        ];
    }
}