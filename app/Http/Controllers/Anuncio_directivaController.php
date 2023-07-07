<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Directiva;

class Anuncio_directivaController extends Controller
{ 
    public function vista(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=DB::table('Anuncio_directiva')->select('ID_ANUNCIO_DIREC', 'DESCRIPCION', 'ID_DIRECTIVA')
        ->orderBy('ID_ANUNCIO_DIREC', 'ASC')
        ->paginate(15);

        return view('Anuncio_administrador', compact('registros', 'texto'));
        

}
}