<?php

namespace App\Http\Controllers;
use App\Models\transacciones;
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
        $transacciones = transacciones::all();
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
