<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Condominio;


class Libro extends Model
{

    public function id()
    {
        return $this->hasMany(Conserje::class);
    }


    use HasFactory;
    protected $table = 'LIBRO';
    protected $primaryKey = 'ID_LIBRO';
    protected $fillable = ['ID_LIBRO', 'EVENTO', 'FECHA_EVENTO',
    'ID_CONSERJE'];

      public $timestamps = false;

    

}

