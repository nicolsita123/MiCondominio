<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin_condominio;

class Anuncio_administrador extends Model
{
  
    public function admin_condominio()
    {
        return $this->belongsTo(admin_condominio::class);
    }


    use HasFactory;
    protected $table = 'Anuncio_administrador';
    protected $primaryKey = 'ID_ANUNCIO_ADMIN';
    protected $fillable = ['ID_ANUNCIO_ADMIN', 'DESCRIPCION', 'ID_ADMIN'];

    public $timestamps = false;


}
