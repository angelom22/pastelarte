<?php
namespace App\Traits\Estudiante;

trait ManageCursos {
    public function cursos() {
        $cursos = auth()->user()->purchasedCursos();
        return view('estudiante.cursos.index', compact('cursos'));
    }
}
