<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function vista(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=DB::table('Servicio')->select('ID_SERVICIO', 'DESCRIPCION', 'DISPONIBILIDAD', 'MONTO_SERVICIO', 'ID_CONDOMINIO')
        ->orderBy('ID_SERVICIO', 'ASC')
        ->paginate(15);

        return view('reserva', compact('registros', 'texto'));
        

}
}
