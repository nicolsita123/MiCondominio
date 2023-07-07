<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio_administrador;
use App\Models\admin_condominio;
use App\Models\anuncio_directiva;

class Anuncio_administradorController extends Controller
{ 
    public function vista(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=DB::table('Anuncio_administrador')->select('ID_ANUNCIO_ADMIN', 'DESCRIPCION', 'ID_ADMIN')
        ->orderBy('ID_ANUNCIO_ADMIN', 'ASC')
        ->paginate(15);

        return view('anuncioadmin.anuncio', compact('registros', 'texto'));
        

}

    public function create()
    {
        // Puedes realizar alguna lógica adicional si es necesario
        return view('anuncioadmin.nuevoanuncio');
    }

    public function store(Request $request)
    {
        $anuncio_administrador = new Anuncio_administrador();
        $anuncio_administrador->DESCRIPCION = $request->input('DESCRIPCION');
        $anuncio_administrador->ID_ADMIN = $request->input('ID_ADMIN');
        $anuncio_administrador->save();

        return redirect()->route('anuncio_administrador.vista');
    }

    public function update(Request $request, $ID_ANUNCIO_ADMIN)
    {
        $anuncio_administrador = Anuncio_administrador::findOrFail($ID_ANUNCIO_ADMIN);
        $anuncio_administrador->DESCRIPCION = $request->input('DESCRIPCION');
        $anuncio_administrador->ID_ADMIN = $request->input('ID_ADMIN');
        $anuncio_administrador->save();

        return redirect()->route('anuncioadmin.nuevoanuncio');
    }

    public function destroy($ID_ANUNCIO_ADMIN)
    {
        $anuncio_administrador = Anuncio_administrador::findOrFail($ID_ANUNCIO_ADMIN);
        $anuncio_administrador->delete();

        return redirect()->route('anuncio_administrador.vista');
    }

    public function vistadi(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=DB::table('Anuncio_directiva')->select('ID_ANUNCIO_DIREC', 'DESCRIPCION', 'ID_DIRECTIVA')
        ->orderBy('ID_ANUNCIO_DIREC', 'ASC')
        ->paginate(15);

        return view('anuncioadmin.anuncio', compact('registros', 'texto'));
        

}

    public function createdi()
    {
        // Puedes realizar alguna lógica adicional si es necesario
        return view('anuncioadmin.nuevoanuncio');
    }

    public function storedi(Request $request)
    {
        $Anuncio_directiva = new Anuncio_directiva();
        $Anuncio_directiva->DESCRIPCION = $request->input('DESCRIPCION');
        $Anuncio_directiva->ID_DIRECTIVA = $request->input('ID_DIRECTIVA');
        $Anuncio_directiva->save();

        return redirect()->route('anuncio_administrador.vista');
    }

    public function updatedi(Request $request, $ID_ANUNCIO_DIREC)
    {
        $Anuncio_directiva = Anuncio_directiva::findOrFail($ID_ANUNCIO_DIREC);
        $Anuncio_directiva->DESCRIPCION = $request->input('DESCRIPCION');
        $Anuncio_directiva->ID_DIRECTIVA = $request->input('ID_DIRECTIVA');
        $Anuncio_directiva->save();

        return redirect()->route('anuncioadmin.nuevoanuncio');
    }

    public function destroydi($ID_ANUNCIO_DIREC)
    {
        $Anuncio_directiva = Anuncio_directiva::findOrFail($ID_ANUNCIO_DIREC);
        $Anuncio_directiva->delete();

        return redirect()->route('anuncio_administrador.vista');
    }
}


