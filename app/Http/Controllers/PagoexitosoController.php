<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoexitosoController extends Controller
{ 
    public function vista(Request $request)
    {
    return view('pagoexitoso');
}
}
