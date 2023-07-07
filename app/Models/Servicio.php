<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condominio;


class Servicio extends Model
{

    public function id()
    {
        return $this->hasMany(Condominio::class);
    }

    public function espacio()
    {
        return $this->hasMany(Espacio::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }


    use HasFactory;
    protected $table = 'SERVICIO';
    protected $primaryKey = 'ID_SERVICIO';
    protected $fillable = ['ID_SERVICIO', 'DESCRIPCION', 'DISPONIBILIDAD', 'MONTO_SERVICIO', 'ID_CONDOMINIO'];

      public $timestamps = false;

    

}

