<?php

use App\Models\fonction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvocatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avocats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('datenaissance')->nullable();
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->foreignIdFor(fonction::class);
            $table->json('biographie')->nullable();
            $table->string('pdfbio')->nullable();
            $table->string('photo')->nullable();
            $table->enum('niveau', array('1','2'));
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
        Schema::dropIfExists('avocats');
    }
}
