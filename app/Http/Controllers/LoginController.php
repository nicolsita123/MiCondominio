<?php

namespace App\Http\Controllers;

use App\Models\admin_condominio;
use App\Models\Residente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginUsuario(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'contrasena'=>'required|min:5|max:20',
        ]);

        $cuenta = admin_condominio::where('correo_administrador', '=', $request->correo_administrador)->first();
        if($cuenta){
            if(Hash::check($request->contrasena_residente, $cuenta->contrasena_residente)){
                $request->session()->put('loginId', $cuenta->id);
                return redirect('usuario');
            }else{
                return back()->with('fail', 'La contraseña es incorrecta');
            }
        }else{
            return back()->with('fail', 'El email no esta registrado');
        }
    }
}
