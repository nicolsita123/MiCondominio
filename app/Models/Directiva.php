<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condominio;
use App\Models\tipo_cuenta;

class Anuncio_administrador extends Model
{
  
    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }


    use HasFactory;
    protected $table = 'DIRECTIVA';
    protected $primaryKey = 'ID_DIRECTIVA';
    protected $fillable = ['ID_DIRECTIVA', 'NUM_RUT', 'DV_RUT', 'NOM_DIRECTIVA', 'APELLIDO_DIRECTIVA', 'CORREO_DIRECTIVA', 'CONTRASENA_DIRECTIVA', 'ID_CONDOMINIO', 'ID_CUENTA'];

    

}
