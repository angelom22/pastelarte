<?php

namespace App\Http\Requests;

use App\Models\Leccion;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            case 'POST':
            {
                return [
                    'title_leccion' => 'required|min:6|max:150',
                    'url_video' => 'required_if:leccion_type,'.Leccion::VIDEO,
                    'curso_id' => [
                        'required',
                        Rule::exists('cursos', 'id')
                    ],
                    'leccion_type' => [
                        'required',
                        Rule::in(Leccion::LeccionTypes())
                    ],
                    'file' => ['required_if:leccion_type,'.Leccion::ZIP , 'file'],
                    'duracion_leccion' => 'required_if:leccion_type,'.Leccion::VIDEO,
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required|min:6|max:150',
                    'url_video' => 'required_if:leccion_type,'.Leccion::VIDEO,
                    'curso_id' => [
                        'required',
                        Rule::exists('cursos', 'id')
                    ],
                    'leccion_type' => [
                        'required',
                        Rule::in(Leccion::LeccionTypes())
                    ],
                    'file' => 'required_if:leccion_type,'.Leccion::ZIP.'|sometimes|file',
                    'duracion_leccion' => 'required_if:leccion_type,'.Leccion::VIDEO,
                ];
            }
            default: {
                return [];
            }
        }
    }
}
