<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Solicitud;
use App\Models\Tipo;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $solicitudes = Solicitud::join('persona as solicitante', 'solicitud.Solicitante', '=', 'solicitante.Id')
                ->join('banco', 'solicitante.Banco', '=', 'banco.Id')
                ->join('tipo', 'solicitud.Tipo', '=', 'tipo.Id')
                ->join('estado', 'solicitud.Estado', '=', 'estado.Id')
                ->select(
                    'solicitud.id',
                    'solicitud.numero',
                    'solicitud.fecha',
                    'solicitante.nombre',
                    'solicitante.numeroCuenta',
                    'banco.Nombre as banco',
                    'solicitud.monto',
                    'solicitud.cantidad',
                    'tipo.Nombre as tipo',
                    'solicitud.tasa',
                    'solicitud.meses',
                    'estado.Nombre as estado',
                    'estado.Id as id_estado'
                )->where('solicitante.Nombre', 'like', '%' . $request->get('search') . '%')->orWhere('solicitud.Numero', 'like', '%' . $request->get('search') . '%')
                ->orderBy('solicitud.Numero', 'desc')
                ->take(10)
                ->get();
        } else {
            $solicitudes = Solicitud::join('persona as solicitante', 'solicitud.Solicitante', '=', 'solicitante.Id')
                ->join('banco', 'solicitante.Banco', '=', 'banco.Id')
                ->join('tipo', 'solicitud.Tipo', '=', 'tipo.Id')
                ->join('estado', 'solicitud.Estado', '=', 'estado.Id')
                ->select(
                    'solicitud.id',
                    'solicitud.numero',
                    'solicitud.fecha',
                    'solicitante.nombre',
                    'solicitante.numeroCuenta as cuenta',
                    'banco.Nombre as banco',
                    'solicitud.monto',
                    'solicitud.cantidad',
                    'tipo.Nombre as tipo',
                    'solicitud.tasa',
                    'solicitud.meses',
                    'estado.Nombre as estado',
                    'estado.Id as id_estado'
                )->orderBy('solicitud.Numero', 'desc')
                ->take(10)
                ->get();
        }

        $response = ["value" => "1", "mensaje"=>"con datos","solicitudes" => $solicitudes];

        return response()->json($response, 200);
        //return $solicitudes;

        /*if($solicitudes->count() > 0)
        {
            return response()->json(
                $solicitudes
            , 200);
        }
        else{
            return response()->json(['valor' => '0','mensaje' => 'Page Not Found. If error persists, contact info@website.com'], 200);
        }*/
    }


    public function create()
    {
        $solicitantes = Persona::select('Id as id','Nombre as nombre')->where('Activo', '=', 1)->get();
        //$fiadores = Persona::where('Activo', '=', 1)->where('Socio', '=', 1)->get();
        //$tipos = Tipo::get();

        $response = ["value" => "1", "mensaje"=>"con datos",'solicitantes' => $solicitantes];

        return response()->json($response, 200);
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
