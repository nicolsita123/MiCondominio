<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_condominio extends Model
{
    public function tipo_cuenta()
    {
        return $this->hasMany(TIPO_CUENTA::class);
    }

    public function condominio()
    {
        return $this->hasMany(Condominio::class);
    }

    use HasFactory;
    protected $table = 'ADMIN_CONDOMINIO';
    protected $primaryKey = 'ID_ADMIN';
    protected $fillable = ['ID_ADMIN', 'NUM_RUT', 'DV_RUT','NOM_ADMINISTRADOR', 'SEG_NOMBRE_NOM_ADMINISTRADOR', 'APELLIDO_PA', 'APELLIDO_MA', 'FECHA_NACIMIENTO', 'CORREO_ADMIN', 'CONTRASENA_ADMIN', 'DIRECCION', 'ID_CONDOMINIO', 'ID_CUENTA'];

    

} 
