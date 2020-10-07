<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'name'          => 'bail|required|between:5,50',
            'fname'         => 'bail|required|alpha|max:20',
            'image'         => 'bail|required|image|dimensions:min_width=100, min_height:100',
            'description'   => 'bail|required|max:500'
        ];
    }
}
