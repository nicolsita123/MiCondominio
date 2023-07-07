<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RESIDENTE;

class Condominio extends Model
{
  
    public function resident()
    {
        return $this->belongsTo(RESIDENTE::class);
    }


    use HasFactory;
    protected $table = 'CONDOMINIO';
    protected $primaryKey = 'ID_CONDOMINIO';
    protected $fillable = ['ID_CONDOMINIO', 'NOMBRE_CONDOMINIO', 'DIRECCION'];

    

}
