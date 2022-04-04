<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccueilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accueils', function (Blueprint $table) {
            $table->id();
            $table->json('textsuivre')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tweeter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google')->nullable();
            $table->json('adresse')->nullable();
            $table->string('email')->nullable();
            $table->json('telphone')->nullable();
            $table->string('p1')->nullable();
            $table->string('p2')->nullable();
            $table->string('p3')->nullable();
            $table->string('p4')->nullable();
            $table->string('l1')->nullable();
            $table->string('l2')->nullable();
            $table->string('l3')->nullable();
            $table->string('l4')->nullable();
            $table->json('txtfooter')->nullable();
            $table->json('t1Team')->nullable();
            $table->json('t2Team')->nullable();
            $table->json('t1Pub')->nullable();
            $table->json('t2Pub')->nullable();
            $table->json('titreTeam')->nullable();
            $table->json('descriptionTeam')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accueils');
    }
}
