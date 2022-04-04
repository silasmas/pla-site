<?php

use App\Models\avocat;
use App\Models\categorie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->json('titre');
            $table->json('soustitre')->nullable();
            $table->json('contenu');
            $table->string('cover')->nullable();
            $table->string('pubpdf')->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(avocat::class);
            $table->foreignIdFor(categorie::class);
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
        Schema::dropIfExists('publications');
    }
}
