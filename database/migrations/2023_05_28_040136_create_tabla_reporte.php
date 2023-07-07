<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
  public function up(): void{Schema::create('compras', function (Blueprint $table) 
    {$table->bigIncrements('id');
        $table->string('id_residente')->nullable();
        $table->float('total', 9, 2);
        $table->tinyInteger('status')->comment('1:pendiente. 2:Aprobada.');
        $table->softDeletes();$table->timestamps();
      });}

   
  public function down(): void{Schema::dropIfExists('compras');}
};