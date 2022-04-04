<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->json('quisommenous')->nullable();
            $table->json('titrecabinet')->nullable();
            $table->json('contenu')->nullable();
            $table->json('slogant')->nullable();
            $table->string('photohome')->nullable();
            $table->string('photoabout')->nullable();
            $table->string('photobenefice')->nullable();
            $table->string('nbrexperience')->nullable();
            $table->json('temps')->nullable();
            $table->json('titreNosValeurs')->nullable();
            $table->json('titreBeneficesmall')->nullable();
            $table->json('titrebigbenefice')->nullable();
            $table->json('resume')->nullable();
            $table->json('b1')->nullable();
            $table->json('r1')->nullable();
            $table->json('b2')->nullable();
            $table->json('r2')->nullable();
            $table->json('b3')->nullable();
            $table->json('r3')->nullable();
            $table->json('b4')->nullable();
            $table->json('r4')->nullable();
            $table->json('b5')->nullable();
            $table->json('r5')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
