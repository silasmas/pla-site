<?php

use App\Models\avocat;
use App\Models\bureau;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvocatBureausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avocat_bureaus', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(bureau::class);
            $table->foreignIdFor(avocat::class);
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
        Schema::dropIfExists('avocat_bureaus');
    }
}
