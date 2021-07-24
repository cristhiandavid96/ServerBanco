<?php

namespace App\Http\Controllers;
use App\Models\cuentasbancarias;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateCuentasBancariasRequest;
use App\Http\Requests\UpdateCuentasBancariasRequest;


class CuentasBancariasController extends Controller
{

    public function store(CreateCuentasBancariasRequest $request)
    {
        
        $input = $request->all();
        cuentasbancarias::create($input);        
        return \Response::json([
            'res'=>true,
            'message'=>'cuenta bancaria creada correctamente!!'
        ] , 200);
        
    }
    
    public function index(Request $request)
    {
        $arraydata =[];
        $usuarios = new usuarios;
        $cuentasbancaria =  cuentasbancarias::all();
        foreach ($cuentasbancaria as $key=>$obj) {
            $cuentasbancaria[$key]['usuario_id'] = $usuarios->getUser($obj->usuario_id)['nombre']; 
        }
        
        return   \Response::json([
            'res'=>$cuentasbancaria, 
        ], 200);
    }

    public function update(UpdateCuentasBancariasRequest $request,$id)
    {
        $input = $request->all();        
        cuentasbancarias::where('id', $id)->update($input);
        return response()->json([
            'res' => true,
            'message' => 'cuenta bancaria Actualizada correctamente'
        ], 200);
    }

    //DELETE elimina datos
    public function destroy($id)
    {
        cuentasbancarias::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'cuenta bancaria Eliminada correctamente'
        ], 200);
    }
}
