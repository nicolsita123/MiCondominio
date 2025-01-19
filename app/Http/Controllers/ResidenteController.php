<?php

namespace App\Http\Controllers;

use App\Models\Residente;
use Illuminate\Http\Request;
use App\Models\Condominio;
use Illuminate\Support\Facades\DB;

class ResidenteController extends Controller
{
 
    public function vista(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros = DB::table('Residente')
        ->select('ID_RESIDENTE', 'NUM_RUT', 'DV_RUT', 'NOM_RESIDENTE', 'SEG_NOMBRE_RESIDENTE', 'APELLIDO_PA', 'APELLIDO_MA', 'FECHA_NACIMIENTO', 'CORREO_RESIDENTE', 'CONTRASENA_RESIDENTE', 'DIRECCION', 'ID_CONDOMINIO', 'ID_CUENTA')
        ->where('NOM_RESIDENTE', 'LIKE', '%'.$texto.'%')
        ->orWhere('NUM_RUT', 'LIKE', '%'.$texto.'%')
        ->orderBy('ID_RESIDENTE', 'ASC')
        ->paginate(15);


        return view('residente', compact('registros', 'texto'));
        
    }




    public function perfil()
    {
        $registros = Residente::all(); // Obtener todos los registros de la tabla

        return view('perfilresidente', ['registros' => $registros]);
    }

    public function create()
    
{
    // Validar los datos ingresados, si es necesario
  return view ('cliente.create');
}
public function destroy($ID_RESIDENTE)
    
{
    $registro=Residente::findOrFail($ID_RESIDENTE);
    $registro->delete();
    return redirect()->route('residente');
  
}

public function update(Request $request, $ID_RESIDENTE)
{
    $residente = Residente::findOrFail($ID_RESIDENTE);
    $residente->NUM_RUT = $request->input('NUM_RUT');
    $residente->DV_RUT = $request->input('DV_RUT');
    $residente->NOM_RESIDENTE = $request->input('NOM_RESIDENTE');
    $residente->SEG_NOMBRE_RESIDENTE = $request->input('SEG_NOMBRE_RESIDENTE');
    $residente->APELLIDO_PA = $request->input('APELLIDO_PA');
    $residente->APELLIDO_MA = $request->input('APELLIDO_MA');
    $residente->CORREO_RESIDENTE = $request->input('CORREO_RESIDENTE');
    $residente->CONTRASENA_RESIDENTE = $request->input('CONTRASENA_RESIDENTE');
    $residente->DIRECCION = $request->input('DIRECCION');
    $residente->ID_CONDOMINIO = $request->input('ID_CONDOMINIO');
    $residente->ID_CUENTA = $request->input('ID_CUENTA');
    $residente->save();
    return redirect()->route('residente');
}


public function edit($ID_RESIDENTE)
    
{
 $registro=Residente::findOrFail($ID_RESIDENTE);
 return view('cliente.edit', compact('registro'));
}

public function store(Request $request)
{

    $residente = new Residente;
    if ($request->has('ID_CONDOMINIO')) {
        $residente->ID_CONDOMINIO = $request->input('ID_CONDOMINIO');
    } else {
    }
    
    

    $residente->NUM_RUT=$request->input('NUM_RUT');
    $residente->DV_RUT=$request->input('DV_RUT');
    $residente->NOM_RESIDENTE=$request->input('NOM_RESIDENTE');
    $residente->SEG_NOMBRE_RESIDENTE=$request->input('SEG_NOMBRE_RESIDENTE');
    $residente->APELLIDO_PA=$request->input('APELLIDO_PA');
    $residente->APELLIDO_MA=$request->input('APELLIDO_MA');
    $residente->FECHA_NACIMIENTO=$request->input('FECHA_NACIMIENTO');
    $residente->CORREO_RESIDENTE=$request->input('CORREO_RESIDENTE');
    $residente->CONTRASENA_RESIDENTE=$request->input('CONTRASENA_RESIDENTE');
    $residente->DIRECCION=$request->input('DIRECCION');
    $residente->ID_CONDOMINIO=$request->input('ID_CONDOMINIO');
    $residente->ID_CUENTA = $request->input('ID_CUENTA');
    $residente->save(); 
    return redirect()->route('residente');
  

}
} 
