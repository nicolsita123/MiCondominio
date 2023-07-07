<?php

namespace App\Http\Controllers;

use App\Models\Residente; // Reemplaza 'Tabla' con el nombre de tu modelo
use Illuminate\Http\Request;
use App\Models\Condominio;
use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\Espacio_comun;
use App\Models\Conserje;
use App\Models\admin_condominio;

use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
 
    public function vista(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=DB::table('Reserva')->select('ID_RESERVA', 'FEC_RESERVA', 'HORA_INICIO', 'HORA_TERMINO', 'ID_RESIDENTE', 'ID_SERVICIO', 'ID_ESPACIO', 'ID_CONSERJE', 'ID_ADMIN')
        ->orderBy('ID_RESERVA', 'ASC')
        ->paginate(15);

        return view('Reserva.reserva', compact('registros', 'texto'));
        
    }




    public function perfil()
    {
        $registros = Reserva::all(); // Obtener todos los registros de la tabla

        return view('reserva.reserva', ['registros' => $registros]);
    }

    public function create()
    
{
  return view ('reserva.nuevareserva');
}
public function destroy($ID_RESERVA)
    
{
    $registro=Reserva::findOrFail($ID_RESERVA);
    $registro->delete();
    return redirect()->route('reserva.reserva');
  
}

public function update(Request $request, $ID_RESERVA)
{
    $reserva = Reserva::findOrFail($ID_RESERVA);
    $reserva->FEC_RESERVA = $request->input('FEC_RESERVA');
    $reserva->HORA_INICIO = $request->input('HORA_INICIO');
    $reserva->HORA_TERMINO = $request->input('HORA_TERMINO');
    $reserva->ID_RESIDENTE = $request->input('ID_RESIDENTE');
    $reserva->ID_SERVICIO = $request->input('ID_SERVICIO');
    $reserva->ID_ESPACIO = $request->input('ID_ESPACIO');
    $reserva->ID_CONSERJE = $request->input('ID_CONSERJE');
    $reserva->ID_ADMIN = $request->input('ID_ADMIN');
    $reserva->save();
    return redirect()->route('reserva.nuevareserva');
}


public function edit($ID_RESERVA)
    
{
 $registro=Reserva::findOrFail($ID_RESERVA);
 return view('reserva.editarreserva', compact('registro'));
}

public function store(Request $request)
{


    $reserva = new Reserva();
    $reserva->FEC_RESERVA = $request->input('FEC_RESERVA');
    $reserva->HORA_INICIO = $request->input('HORA_INICIO');
    $reserva->HORA_TERMINO = $request->input('HORA_TERMINO');
    $reserva->ID_RESIDENTE = $request->input('ID_RESIDENTE');
    $reserva->ID_SERVICIO = $request->input('ID_SERVICIO');
    $reserva->ID_ESPACIO = $request->input('ID_ESPACIO');
    $reserva->ID_CONSERJE = $request->filled('ID_CONSERJE') ? $request->input('ID_CONSERJE') : null;
    $reserva->ID_ADMIN = $request->filled('ID_ADMIN') ? $request->input('ID_ADMIN') : null;
    $reserva->save();
    return redirect()->route('reserva.vista');
  

}
} 