<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condominio;


class RESIDENTE extends Model
{

    public function id()
    {
        return $this->hasMany(CONDOMINIO::class);
    }

    public function moroso()
    {
        return $this->hasMany(CUENTA_MOROSA::class);
    }

    public function tarjeta()
    {
        return $this->hasMany(TARJETA::class);
    }


    use HasFactory;
    protected $table = 'RESIDENTE';
    protected $primaryKey = 'ID_RESIDENTE';
    protected $fillable = ['ID_RESIDENTE', 'NUM_RUT', 'DV_RUT',
    'NOM_RESIDENTE', 'SEG_NOMBRE_RESIDENTE',
     'APELLIDO_PA', 'APELLIDO_MA', 'FECHA_NACIMIENTO',
      'CORREO_RESIDENTE', 'CONTRASENA_RESIDENTE', 'DIRECCION', 'ID_CONDOMINIO'];

      public $timestamps = false;

    

}

