<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCartesTable extends Migration
{
    public function up()
    {
        Schema::table('cartes', function (Blueprint $table) {
            $table->unsignedBigInteger('institut_id')->nullable();
            $table->foreign('institut_id', 'institut_fk_9183448')->references('id')->on('users');
        });
    }
}
