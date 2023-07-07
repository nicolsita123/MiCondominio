<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Conserje;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    public function vista(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = DB::table('Libro')
            ->select('ID_LIBRO', 'EVENTO', 'FECHA_EVENTO', 'ID_CONSERJE')
            ->where('EVENTO', 'LIKE', '%' . $texto . '%')
            ->orderBy('ID_LIBRO', 'ASC')
            ->paginate(15);

        return view('libro.libro', compact('registros', 'texto'));
    }

    public function create()
    {
        // Puedes realizar alguna lógica adicional si es necesario
        return view('libro.crearlibro');
    }

    public function store(Request $request)
    {
        $libro = new Libro();
        $libro->EVENTO = $request->input('EVENTO');
        $libro->FECHA_EVENTO = $request->input('FECHA_EVENTO');
        $libro->ID_CONSERJE = $request->input('ID_CONSERJE');
        $libro->save();

        return redirect()->route('libro.vista');
    }

    public function update(Request $request, $ID_LIBRO)
    {
        $libro = Libro::findOrFail($ID_LIBRO);
        $libro->EVENTO = $request->input('EVENTO');
        $libro->FECHA_EVENTO = $request->input('FECHA_EVENTO');
        $libro->ID_CONSERJE = $request->input('ID_CONSERJE');
        $libro->save();

        return redirect()->route('libro.librocrear');
    }

    public function destroy($ID_LIBRO)
    {
        $libro = Libro::findOrFail($ID_LIBRO);
        $libro->delete();

        return redirect()->route('libro.vista');
    }
}
