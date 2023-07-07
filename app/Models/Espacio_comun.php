<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condominio;


class Espacio_comun extends Model
{

    public function id()
    {
        return $this->hasMany(Residente::class);
    }

    public function servicio()
    {
        return $this->hasMany(Servicio::class);
    }

    public function condominio()
    {
        return $this->hasMany(Condominio::class);
    }
    public function conserje()
    {
        return $this->hasMany(Conserje::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }


    use HasFactory;
    protected $table = 'ESPACIO_COMUN';
    protected $primaryKey = 'ID_ESPACIO';
    protected $fillable = ['ID_ESPACIO', 'DESCRIPCION', 'DISPONIBILIDAD', 'MONTO_ARRIENDO', 'ID_CONDOMINIO'];

      public $timestamps = false;

    

}

