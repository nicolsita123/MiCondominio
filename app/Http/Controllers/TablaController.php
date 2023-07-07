<?php

namespace App\Http\Controllers;

use App\Models\Condominio; // Reemplaza 'Tabla' con el nombre de tu modelo
use Illuminate\Http\Request;


class TablaController extends Controller
{
    public function tablita()
    {
        $registros = Condominio::all(); // Obtener todos los registros de la tabla

        return view('tablitaa', ['registros' => $registros]);
    }
}
