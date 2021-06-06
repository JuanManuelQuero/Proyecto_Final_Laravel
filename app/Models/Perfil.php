<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    //Creamos la relacion con la tabla Usuarios
    public function usuarios() {
        return $this->hasMany(Perfil::class);
    }

    //Creamos una funcion para asignar el id a cada nombre de los perfiles creados
    public static function getId() {
        $perfiles = Perfil::orderBy('nombre')->get();
        $miArray = [];
        foreach($perfiles as $item) {
            $miArray[$item->id] = $item->nombre;
        }
        return $miArray;
    }

    public function scopeNombre($query, $v) {
        if(!isset($v)) {
            return $query->where('nombre', 'like', '%');
        }switch($v) {

            case '%':
                return $query->where('nombre', 'like', '%');
                break;

            case '1':
                return $query->where('nombre', 'like', 'a%')->orWhere('nombre', 'like', 'b%')->orWhere('nombre', 'like', 'c%')
                ->orWhere('nombre', 'like', 'd%')->orWhere('nombre', 'like', 'e%')->orWhere('nombre', 'like', 'f%');
                break;

            case '2':
                return $query->where('nombre', 'like', 'g%')->orWhere('nombre', 'like', 'h%')->orWhere('nombre', 'like', 'i%')
                ->orWhere('nombre', 'like', 'j%')->orWhere('nombre', 'like', 'k%')->orWhere('nombre', 'like', 'l%')->orWhere('nombre', 'like', 'm%');
                break;

            case '3':
                return $query->where('nombre', 'like', 'n%')->orWhere('nombre', 'like', 'o%')->orWhere('nombre', 'like', 'p%')
                ->orWhere('nombre', 'like', 'q%')->orWhere('nombre', 'like', 'r%')->orWhere('nombre', 'like', 's%')->orWhere('nombre', 'like', 't%');
                break;

            case '4':
                return $query->where('nombre', 'like', 'u%')->orWhere('nombre', 'like', 'v%')->orWhere('nombre', 'like', 'w%')
                ->orWhere('nombre', 'like', 'x%')->orWhere('nombre', 'like', 'y%')->orWhere('nombre', 'like', 'z%');
                break;
        }
    }
}
