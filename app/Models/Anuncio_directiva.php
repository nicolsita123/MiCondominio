<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\directiva;

class Anuncio_administrador extends Model
{
  
    public function directiva()
    {
        return $this->belongsTo(directiva::class);
    }


    use HasFactory;
    protected $table = 'ID_ANUNCIO_DIREC';
    protected $primaryKey = 'ID_ANUNCIO_DIREC';
    protected $fillable = ['ID_ANUNCIO_DIREC', 'DESCRIPCION', 'ID_DIRECTIVA'];

    

}
