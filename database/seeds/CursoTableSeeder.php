<?php

use Illuminate\Database\Seeder;
use App\Helpers\Image;
use App\User;
use App\Models\Curso;
use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Course
 *
 *@property int $id
* @property int $user_id
* @property string $title
* @property string $picture
* @property string $description
* @property float $price
* @property int $featured
* @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Course whereFeatured($value)
 */

class CursoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cursos')->insert([
            [
                "user_id" => 1,
                "carrera_id" => 2,
                "title" => "Curso de Pasteleria",
                "slug" => "curso-de-pasteleria",
                "thumbnail" => "img/courses/t3.png",
                "extracto" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                "description" => "Esta es la descripción del curso.",
                "precio" => 20,
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                "user_id" => 1,
                "carrera_id" => 2,
                "title" => "Curso de Masas",
                "slug" => "curso-de-masas",
                "thumbnail" => "img/courses/t3.png",
                "extracto" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                "description" => "Esta es la descripción del curso.",
                "precio" => 25,
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "user_id" => 1,
                "carrera_id" => 2,
                "title" => "Curso de decoración de tortas comerciales",
                "slug" => "curso-de-decoración-de-tortas-comerciales",
                "thumbnail" => "img/courses/t3.png",
                "extracto" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                "description" => "Esta es la descripción del curso.",
                "precio" => 30,
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "user_id" => 1,
                "carrera_id" => 3,
                "title" => "Curso de Ténicas de Fondant",
                "slug" => "curso-de-Ténicas-de-Fondant",
                "thumbnail" => "img/courses/t3.png",
                "extracto" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                "description" => "Esta es la descripción del curso.",
                "precio" => 10,
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "user_id" => 1,
                "carrera_id" => 1,
                "title" => "Curso Gratuito",
                "slug" => "curso-gratis",
                "thumbnail" => "img/courses/t3.png",
                "extracto" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                "description" => "Esta es la descripción del curso.",
                "precio" => 15,
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "status" => Curso::INHABILITADO,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 1,
                "featured" => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]

    );

    }
}
