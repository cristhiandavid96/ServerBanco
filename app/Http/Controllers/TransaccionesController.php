<?php

namespace App\Http\Controllers;
use App\Models\transacciones;
use App\Models\usuarios;
use App\Models\cuentasbancarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateTransaccionesRequest;
use App\Http\Requests\UpdateTransaccionesRequest;


class TransaccionesController extends Controller
{

    public function store(CreateTransaccionesRequest $request)
    {
        
        $input = $request->all();
        transacciones::create($input);        
        return \Response::json([
            'res'=>true,
            'message'=>'transaccion creada correctamente!!'
        ] , 200);
        
    }
    public function index(Request $request)
    {
        $arraydata =[];
        $userid = $request['usuario_id'] ?? null;
        $usuarios = new usuarios;
        $cuentasbancarias = new cuentasbancarias;
        $transacciones =  transacciones::where('usuario_id',$userid)->get();

        foreach ($transacciones as $key=>$obj) {
            $transacciones[$key]['usuario_id'] = $usuarios->getUser($obj->usuario_id)['nombre']; 
            $transacciones[$key]['cuenta_origen'] = $cuentasbancarias->getCuenta($obj->cuenta_origen)['numero']; 
            $transacciones[$key]['cuenta_destino'] = $cuentasbancarias->getCuenta($obj->cuenta_destino)['numero']; 
        }
        
        return   \Response::json([
            'res'=>$transacciones, 
        ], 200);
    }

    public function update(UpdateTransaccionesRequest $request,$id)
    {
        $input = $request->all();        
        transacciones::where('id', $id)->update($input);
        return response()->json([
            'res' => true,
            'message' => 'transaccion Actualizada correctamente'
        ], 200);
    }

    //DELETE elimina datos
    public function destroy($id)
    {
        transacciones::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'transaccion Eliminada correctamente'
        ], 200);
    }
}
