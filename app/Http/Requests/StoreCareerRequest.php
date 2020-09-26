<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerRequest extends FormRequest
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
            'title'             => 'required|min:5|max:255|unique:carreras',
            'precio'            => 'required|numeric',
            'description'       => 'required',
            'url_video_preview_carrera' => 'required|active_url'
            // 'thumbnail'         => 'required|image|max:2048',
        ];
    }
}
