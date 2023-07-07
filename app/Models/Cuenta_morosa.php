<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta_morosa extends Model
{
    public $timestamps = false;

    public function residente()
    {
        return $this->hasMany(RESIDENTE::class);
    }

    use HasFactory;
    protected $table = 'CUENTA_MOROSA';
    protected $primaryKey = 'ID_CUENTA';
    protected $fillable = ['ID_CUENTA', 'TOTAL_PAGO'];

    

}

