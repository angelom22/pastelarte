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
                'title' => 'Pastelería',
                'slug' => "pasteleria",
                'description' => 'descripcion de la carrera pastelería'
                ],
                ['title' => 'Decoración de Tortas',
                'slug' => "decoracion-de-tortas",
                'description' => 'descripcion de la carrera decoración de tortas'
                ]     
            ]
           
        );
    }
}
