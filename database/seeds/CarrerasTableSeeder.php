<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert(
            [
                [
                'title'         => 'General',
                'slug'          => "cursos-generales",
                'description'   => 'este es un curso que no esta no esta asociado a ninguna de las carreras de pastel arte',
                'precio'        => 0,
                'url_video_preview_carrera' => ''
                ],
                [
                'title'         => 'Pastelería',
                'slug'          => "pasteleria",
                'description'   => 'descripcion de la carrera pastelería',
                'precio'        => 100,
                'url_video_preview_carrera' => 'https://player.vimeo.com/video/454182996'
                ],
                ['title'        => 'Decoración de Tortas',
                'slug'          => "decoracion-de-tortas",
                'description'   => 'descripcion de la carrera decoración de tortas',
                'precio'        => 100,
                'url_video_preview_carrera' => 'https://player.vimeo.com/video/454182996'
                ]     
            ]
           
        );
    }
}
