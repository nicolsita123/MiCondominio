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

    public function tipo_cuenta()
    {
        return $this->hasMany(TIPO_CUENTA::class);
    }

    public function condominio()
    {
        return $this->hasMany(Condominio::class);
    }




    use HasFactory;
    protected $table = 'CONSERJE';
    protected $primaryKey = 'ID_CONSERJE';
    protected $fillable = ['ID_CONSERJE', 'NUM_RUT', 'DV_RUT', 'NOMBRE_CONSERJE', 'APELLIDO_CONSERJE', 'CORREO_CONSERJE', 'CONTRASENA_CONSERJE', 'ID_CONDOMINIO', 'ID_CUENTA'];

      public $timestamps = false;

    

}

