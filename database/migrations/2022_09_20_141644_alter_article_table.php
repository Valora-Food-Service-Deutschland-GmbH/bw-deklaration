<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->dropColumn('burn_kj');
            $table->dropColumn('burn_kcal');
            $table->dropColumn('weight');
            $table->string('burn_kj')->nullable('true')->default(NULL);
            $table->string('burn_kcal')->nullable('true')->default(NULL);
            $table->string('weight')->nullable('true')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
