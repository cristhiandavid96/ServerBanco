<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuentasbancarias extends Model
{
    protected $table = 'cuentas_bancarias';
    protected $primaryKey ='id';
    protected $fillable = [
        'numero',
        'estado',
        'valor',
        'usuario_id',
    ];
    
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function rules($isNew = true)
    {
        return [
            'numero' => 'required',
            'estado' => 'required',
            'valor' => 'required',
            'usuario_id' => 'required',
        ];
    }
    
}