<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'carrera_id'        => 'required',
            'title'             => 'required|min:5|max:255',Rule::unique('carreras')->ignore($this->title),
            'thumbnail'         => 'image|max:2048',
            'description'       => 'required',
            'extracto'          => 'required',
            'precio'            => 'required|numeric',
            'duracion_curso'    => 'required|date_format:H:i',
            'nivel_habilidad'   => 'required',
            'lengueaje'         => 'required',
            'instructor'        => 'required',
            'url_video_preview_curso' => 'required|active_url'
        ];
    }
}
