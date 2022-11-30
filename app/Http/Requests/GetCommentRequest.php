<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetCommentRequest extends FormRequest
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
            'restaurant_id'         => 'required_without:food_id',
            'food_id'         => 'required_without:restaurant_id'
        ];
    }
}
