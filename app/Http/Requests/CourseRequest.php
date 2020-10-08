<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
        switch ($this->method()) {
            case "POST": {
                return [
                    'carrera_id'        => 'required',
                    'title'             => 'required|min:5|max:255|unique:cursos',
                    'thumbnail'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
                    'description'       => 'required',
                    'extracto'          => 'required',
                    'precio'            => 'required_if:gratis,'.false,
                    'nivel_habilidad'   => 'required',
                    'lenguaje'          => 'required',
                    'instructor'        => 'required',
                    'url_video_preview_curso' => 'required|active_url'
                ];
            }
            case "PUT": {
                return [
                    'carrera_id'        => 'required',
                    // 'title'             => 'required|min:5|max:255',Rule::unique('cursos')->ignore($this->title),
                    'title'             => 'required|min:5|unique:cursos,title,' . $this->route('curso')->id,
                    'thumbnail'         => 'required|sometimes|image|mimes:jpg,jpeg,png|max:2048',
                    'description'       => 'required',
                    'extracto'          => 'required',
                    'precio'            => 'required|numeric',
                    'nivel_habilidad'   => 'required',
                    'lengueaje'         => 'required',
                    'instructor'        => 'required',
                    'url_video_preview_curso' => 'required|active_url'
                ];
            }
            default: {
                return [];
            }
        }
    }
}
