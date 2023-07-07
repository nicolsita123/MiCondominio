<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condominio;


class Reserva extends Model
{

    public function id()
    {
        return $this->hasMany(Residente::class);
    }

    public function servicio()
    {
        return $this->hasMany(Servicio::class);
    }

    public function espacio()
    {
        return $this->hasMany(Espacio::class);
    }
    public function conserje()
    {
        return $this->hasMany(Conserje::class);
    }

    public function admin()
    {
        return $this->hasMany(Administrador::class);
    }


    use HasFactory;
    protected $table = 'RESERVA';
    protected $primaryKey = 'ID_RESERVA';
    protected $fillable = ['ID_RESERVA', 'FEC_RESERVA', 'HORA_INICIO', 'HORA_TERMINO', 'ID_RESIDENTE', 'ID_SERVICIO', 'ID_ESPACIO', 'ID_CONSERJE', 'ID_ADMIN'];

      public $timestamps = false;

    

}

