<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta; 
use App\Models\RESIDENTE;

class TarjetaController extends Controller
{
    public function tarjeta()
    {
        $registros = Tarjeta::all(); // Obtener todos los registros de la tabla
        

        return view('pagar', ['registros' => $registros]);

    }
}











   

