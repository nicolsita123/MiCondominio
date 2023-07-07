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
use App\Models\reserva;
use App\Models\servicio;
use App\Models\Espacio_comun;
use Illuminate\Database\Eloquent\Model;

class PagoreservaController extends Controller
{
    public function reserva(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = DB::table('Reserva')
            ->select('ID_RESERVA', 'FEC_RESERVA', 'HORA_INICIO', 'HORA_TERMINO', 'ID_RESIDENTE', 'ID_SERVICIO', 'ID_ESPACIO', 'ID_CONSERJE', 'ID_ADMIN')
            ->orderBy('ID_RESERVA', 'ASC')
            ->paginate(15);

        return view('reserva', compact('registros', 'texto'));
    }

    public function tarjeta(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = DB::table('Tarjeta')
            ->select('ID_TARJETA', 'DUEÑO_TARJETA', 'NUM_TARJETA', 'FEC_VENCIMIENTO', 'CVC', 'ID_RESIDENTE')
            ->paginate(15);

        return view('pagar', compact('registros', 'texto'));
    }

    public function pago(Request $request)
    {
        $idServicio = $request->input('ID_SERVICIO'); // Obtener el ID de servicio seleccionado por el usuario desde la solicitud
        $idEspacioComun = $request->input('ID_ESPACIO'); // Obtener el ID de espacio común seleccionado por el usuario desde la solicitud
    
        $montoServicio = DB::table('SERVICIO')->where('ID_SERVICIO', $idServicio)->sum('MONTO_SERVICIO');
        $montoEspacioComun = DB::table('ESPACIO_COMUN_MES')->where('ID_ESPACIO', $idEspacioComun)->sum('MONTO_ARRIENDO');
    
        $totalAPagar = $montoServicio + $montoEspacioComun;
    
        $registrosServicio = Servicio::all();
        $registrosEspacioComun = Espacio_comun::all();

        return view('reserva', compact('registrosServicio', 'registrosEspacioComun', 'totalAPagar'));

    }
    
    
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
    $idServicio = $request->input('ID_SERVICIO'); // Obtener el ID de servicio seleccionado por el usuario desde la solicitud
    $idEspacioComun = $request->input('ID_ESPACIO'); // Obtener el ID de espacio común seleccionado por el usuario desde la solicitud

    $montoServicio = DB::table('SERVICIO')->where('ID_SERVICIO', $idServicio)->sum('MONTO_SERVICIO');
    $montoEspacioComun = DB::table('ESPACIO_COMUN_MES')->where('ID_ESPACIO', $idEspacioComun)->sum('MONTO_ARRIENDO');

    $totalAPagar = $montoServicio + $montoEspacioComun;

    $registro = Reserva::select('ID_ESPACIO', 'ID_SERVICIO')
        ->where('ID_RESERVA', $request->ID_RESIDENTE)
        ->first();

    if ($registro) {
        $nueva_compra = new Compra();
        $nueva_compra->session_id = "123456";
        $nueva_compra->total = $totalAPagar;
        $nueva_compra->status = '1';
        $nueva_compra->save();

        $url_to_pay = $this->start_web_pay_plus_transaction($nueva_compra);

        $registrosServicio = Servicio::all();
        $registrosEspacioComun = Espacio_comun::all();


        return view('reserva', compact('registrosServicio', 'registrosEspacioComun', 'totalAPagar', 'url_to_pay'));

    } else {
        return redirect()->back()->withErrors('No posee una reserva');
    }
}

    
    public function start_web_pay_plus_transaction($nueva_compra)
    {
        $transaccion = (new Transaction)->create(

            $nueva_compra->id, //orden de compra
            $nueva_compra->session_id,
            $nueva_compra->total, //monto
            route('confirmar_pago')
        );
        $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
        
        return $url;
    } 

    public function confirmar_pago(Request $request)
    {
        return redirect('reserva');

    }
}