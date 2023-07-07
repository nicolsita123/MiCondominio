<?php

namespace App\Http\Controllers;

use App\Models\Cuenta_morosa; // Reemplaza 'Tabla' con el nombre de tu modelo
use Illuminate\Http\Request;
use App\Models\Compra;


class PagarController extends Controller
{
    public function pago()
    {
        $registros = Cuenta_morosa::all(); // Obtener todos los registros de la tabla

        return view('pagar', ['registros' => $registros]);
    }
}





   

