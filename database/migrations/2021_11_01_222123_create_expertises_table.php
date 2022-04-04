<?php

use App\Models\sorte;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPSTORM_META\type;

class CreateExpertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expertises', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(sorte::class);
            $table->enum('sorte', array('1','2'));
            $table->json('titre1')->nullable();
            $table->json('titre2')->nullable();
            $table->json('contenu')->nullable();
            $table->string('photo')->nullable();
            $table->string('pdf')->nullable();
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
        Schema::dropIfExists('expertises');
    }
}
