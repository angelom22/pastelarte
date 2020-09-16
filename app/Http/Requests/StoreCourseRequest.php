<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'leccion_id' => 'required',
            'carrera_id' => 'required',
            'title' => 'required|min:5|max:255|unique:cursos',
            'thumbnail' => 'required|image|max:2048',
            'description' => 'required',
            'precio' => 'required|numeric',
            'duracion_curso' => 'required',
            'nivel_habilidad' => 'required',
            'lengueaje'  => 'required',
            'instructor'  => 'required',
            'title_leccion'  => 'required',
            'desciption_leccion' => 'required',
            'duracion_leccion' => 'required',
            'url_video' => 'required'

            
        ];
    }
}
