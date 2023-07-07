<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Compra;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\Cuenta_morosa;
use App\Models\RESIDENTE;
use App\Models\Tarjeta;
use Illuminate\Database\Eloquent\Model;

class CompraController extends Controller
{
    public function residente(Request $request, $compra_id = null)
    {
        $texto = trim($request->get('texto'));
        $registros = DB::table('Residente')
            ->select('ID_RESIDENTE', 'NUM_RUT', 'DV_RUT', 'NOM_RESIDENTE', 'SEG_NOMBRE_RESIDENTE', 'APELLIDO_PA', 'APELLIDO_MA', 'FECHA_NACIMIENTO', 'CORREO_RESIDENTE', 'CONTRASENA_RESIDENTE', 'DIRECCION', 'ID_CONDOMINIO')
            ->where('NOM_RESIDENTE', 'LIKE', '%' . $texto . '%')
            ->orWhere('NUM_RUT', 'LIKE', '%' . $texto . '%')
            ->orderBy('ID_RESIDENTE', 'ASC')
            ->paginate(15);

        return view('residente', compact('registros', 'texto', 'compra_id'));
    }

    public function tarjeta(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = DB::table('Tarjeta')
            ->select('ID_TARJETA', 'DUEÑO_TARJETA', 'NUM_TARJETA', 'FEC_VENCIMIENTO', 'CVC', 'ID_RESIDENTE')
            ->paginate(15);

        return view('pagar', compact('registros', 'texto'));
    }

    public function pago()
    {
        $registros = Cuenta_morosa::all();

        return view('pagar', compact('registros'));
    }

    //configurar las credenciales de webpay de acuerdo al enterno de la app jiji
    public function __construct()
    {
        if (app()->environment('production')) {
            WebpayPlus::configureForProduction(
                env('webpay_plus_cc'),
                env('webpay_plus_api_key')
            );
        } else {
            WebpayPlus::configureForTesting();
        }
    }

    public function iniciar_compra(Request $request)
{
    $registro = Cuenta_morosa::select('ID_CUENTA', 'TOTAL_PAGO')
        ->where('ID_CUENTA', $request->ID_RESIDENTE)
        ->first();

    if ($registro) {
        $nueva_compra = new Compra();
        $nueva_compra->id_residente = $request->ID_RESIDENTE;
        $nueva_compra->total = $registro->TOTAL_PAGO;
        $nueva_compra->status = '1';
        $nueva_compra->save();

        $compra_id = $nueva_compra->id;
        $url_to_pay = $this->start_web_pay_plus_transaction($nueva_compra);

        $registros = Cuenta_morosa::where('ID_CUENTA', $request->ID_RESIDENTE)
            ->get();

        return view('pagar', compact('registros', 'url_to_pay'));
    } else {
        return redirect()->back()->withErrors('El residente no posee ninguna deuda.');
    }
}


    public function start_web_pay_plus_transaction($nueva_compra)
{
    $transaccion = (new Transaction)->create(
        $nueva_compra->id, // Orden de compra (id de la compra)
        $nueva_compra->id_residente,
        $nueva_compra->total, // Monto
        route('confirmar_pago', ['TBK_ORDEN_COMPRA' => $nueva_compra->id])
    );
    
    $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
    
    return $url;
}

    


public function confirmar_pago(Request $request)
{
    $compra_id = $request->input('TBK_ORDEN_COMPRA');

    if (!empty($compra_id)) {
        // Eliminar la deuda de la tabla Cuenta_morosa
        $registro = Cuenta_morosa::find($compra_id);
        if ($registro) {
            $idResidente = $registro->ID_CUENTA;
            Cuenta_morosa::where('ID_CUENTA', $idResidente)->delete();
        }
        return redirect('exito')->with('success', 'Pago confirmado. La deuda ha sido eliminada.');
    } else {
        return redirect('exito')->withErrors('No se pudo obtener el ID de compra.');
    }
}

    

}