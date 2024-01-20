<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LogueoController extends Controller
{
    public function login(Request $request)
    {
        $response = ["value" => "0", "mensaje"=>"credenciales no válidas","usuario" => ["Id"=>null,"Usuario"=>null]];
        if($request->usuario && $request->password)
        {
            $usuario = Usuario::where('Usuario','=',$request->usuario)->where('Clave','=',$request->password)->select('Id','Usuario')->first();
            if($usuario)
            {
                $response = ["value" => "1", "mensaje"=>"credenciales válidas","usuario" => $usuario];
            }

        }
        return response()->json($response, 200);
    }
}
