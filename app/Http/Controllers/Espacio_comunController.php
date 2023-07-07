<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Servicio;
use App\Models\Condominio;

class Espacio_comunController extends Controller
{ 
    public function vista(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=DB::table('Espacio_comun')->select('ID_ESPACIO', 'DESCRIPCION', 'DISPONIBILIDAD', 'MONTO_ARRIENDO', 'ID_CONDOMINIO')
        ->orderBy('ID_ESPACIO', 'ASC')
        ->paginate(15);

        return view('reserva', compact('registros', 'texto'));
        

}
}
