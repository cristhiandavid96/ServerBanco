<?php

namespace App\Http\Controllers;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;


class UserController extends Controller
{

    public function store(CreateUsuariosRequest $request)
    {
        
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        
        usuarios::create($input);
        
        return \Response::json([
            'res'=>true,
            'message'=>'usuario creado correctamente!!'
        ] , 200);
        
    }
    public function index(Request $request)
    {
        $usuarios = usuarios::all();
        return   \Response::json([
            'res'=>$usuarios, 
        ], 200);
    }

    public function update(UpdateUsuariosRequest $request,$id)
    {
        $input = $request->all();        
        usuarios::where('id', $id)->update($input);
        return response()->json([
            'res' => true,
            'message' => 'usuario Actualizado correctamente'
        ], 200);
    }

    //DELETE elimina datos
    public function destroy($id)
    {
        usuarios::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'usuario Eliminado correctamente'
        ], 200);
    }
}
