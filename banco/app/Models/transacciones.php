<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transacciones extends Model
{
    protected $table = 'transacciones';
    protected $primaryKey ='id';
    protected $fillable = [
        'cuenta_origen',
        'cuenta_destino',
        'estado',
        'valor_transferido',
        'usuario_id',
    ];
    
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function rules($isNew = true)
    {
        return [
            'cuenta_origen' => 'required',
            'cuenta_destino' => 'required',
            'valor_transferido' => 'required',
            'usuario_id' => 'required',
        ];
    }
}
