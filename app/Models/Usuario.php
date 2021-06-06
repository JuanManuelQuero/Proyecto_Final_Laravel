<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = ['nomusu', 'mail', 'localidad', 'perfil_id'];

    //Creamos la relacion con la tabla Perfiles
    public function perfil() {
        return $this->belongsTo(Perfil::class);
    }

    public function scopeLocalidad($query, $v) {
        if($v != '%') {
            return $query->where('localidad', $v);
        }
        return $query->where('localidad', 'like', '%');
    }
}
