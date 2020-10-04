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
                "thumbnail" => "FF9733",
                "extracto" => "este es el extractor del curso de pasteleria",
                "description" => "Esta es la descripción del curso.",
                "precio" => 19.99,
                "duracion_curso" => "01:00",
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "valoracion" => null,
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
            ],
            
            [
                "user_id" => 1,
                "carrera_id" => 2,
                "title" => "Curso de Masas",
                "slug" => "curso-de-masas",
                "thumbnail" => "FF9733",
                "extracto" => "este es el extractor del curso de masas",
                "description" => "Esta es la descripción del curso.",
                "precio" => 19.99,
                "duracion_curso" => "00:30",
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "valoracion" => null,
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
            ],
            [
                "user_id" => 1,
                "carrera_id" => 2,
                "title" => "Curso de decoración de tortas comerciales",
                "slug" => "curso-de-decoración-de-tortas-comerciales",
                "thumbnail" => "FF9733",
                "extracto" => "este es el extractor del curso de decoración de tortas comerciales",
                "description" => "Esta es la descripción del curso.",
                "precio" => 19.99,
                "duracion_curso" => "01:00",
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "valoracion" => null,
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
            ],
            [
                "user_id" => 1,
                "carrera_id" => 3,
                "title" => "Curso de Ténicas de Fondant",
                "slug" => "curso-de-Ténicas-de-Fondant",
                "thumbnail" => "FF9733",
                "extracto" => "este es el extractor del curso de Ténicas de Fondant",
                "description" => "Esta es la descripción del curso.",
                "precio" => 19.99,
                "duracion_curso" => "01:00",
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "valoracion" => null,
                "status" => Curso::DISPONIBLE,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 0,
                "featured" => 1,
            ],
            [
                "user_id" => 1,
                "carrera_id" => 1,
                "title" => "Curso Gratuito",
                "slug" => "curso-gratis",
                "thumbnail" => "FF9733",
                "extracto" => "este es el extractor del curso gratis",
                "description" => "Esta es la descripción del curso.",
                "precio" => 19.99,
                "duracion_curso" => "00:20",
                "nivel_habilidad" => "Básico",
                "lenguaje" => "Español",
                "instructor" => "chef Beatriz Roman",
                "valoracion" => null,
                "status" => Curso::INHABILITADO,
                "url_video_preview_curso" => 'https://player.vimeo.com/video/454182996',
                "gratis" => 1,
                "featured" => 1,
            ],
        ]
    
    );       

    }
}
