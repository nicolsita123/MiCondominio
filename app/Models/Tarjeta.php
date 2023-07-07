<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    
    public $timestamps = false;

    public function residente()
    {
        return $this->hasMany(RESIDENTE::class);
    }
    use HasFactory;
    protected $table = 'TARJETA';
    protected $primaryKey = 'ID_TARJETA';
    
    protected $fillable = ['ID_TARJETA', 'ID_RESIDENTE', 'TOTAL_PAGO'];
}

