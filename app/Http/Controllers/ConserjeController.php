<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use Illuminate\Http\Request;
use App\Models\Conserje;
use Illuminate\Support\Facades\DB;

class ConserjeController extends Controller
{
    public function vista(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=DB::table('Conserje')->select('ID_CONSERJE', 'NUM_RUT', 'DV_RUT', 'NOMBRE_CONSERJE', 'APELLIDO_CONSERJE', 'CORREO_CONSERJE','CONTRASENA_CONSERJE', 'ID_CONDOMINIO', 'ID_CUENTA')
        ->orderBy('ID_CONSERJE', 'ASC')
        ->paginate(15);

        return view('reserva', compact('registros', 'texto'));
        

}
}
