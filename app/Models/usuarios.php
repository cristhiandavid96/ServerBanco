<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuarios extends Authenticatable
{
    use HasApiTokens,Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey ='id';
    protected $fillable = [
        'nombre',
        'password',
        'documento'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    
    public function getUser($usuario_id)
    {
        $user = usuarios::find($usuario_id);
        return ['id'=>$user->id,'nombre'=>$user->nombre];
    }
}
