<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartesTable extends Migration
{
    public function up()
    {
        Schema::create('cartes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref')->unique();
            $table->integer('montant');
            $table->string('aprenom');
            $table->string('anom');
            $table->string('amail');
            $table->longText('amsg');
            $table->string('deprenom');
            $table->string('denom');
            $table->string('demail');
            $table->string('stripeid')->nullable();
            $table->string('statut')->nullable();
            $table->date('use')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
