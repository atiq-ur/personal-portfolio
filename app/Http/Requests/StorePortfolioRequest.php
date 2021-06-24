<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'category_id' => ['required'],
            'client_name' => ['required'],
            'project_date' => ['required'],
            'project_url' => ['required'],
            'project_title' => ['required'],
            'project_desc' => ['required'],
        ];
    }
}
