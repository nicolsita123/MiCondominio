<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Compra extends Model
{
    use HasFactory;
    

    public function tarjeta()
    {
        return $this->hasOne(Tarjeta::class, 'id_tarjeta'); // 'compra_id' es el nombre de la columna de clave foránea en la tabla 'Tarjeta'
    }
    
}
