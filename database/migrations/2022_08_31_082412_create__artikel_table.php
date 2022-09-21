<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_artikel', function (Blueprint $table) {
            #$table->collation('latin1_german1_ci');
            $table->id();
            $table->string('address',255)->nullable('true')->default(NULL);
            $table->text('ingredients')->nullable('true')->default(NULL);
            $table->string('fat', 15)->nullable('true')->default(NULL);
            $table->string('fattyacids', 15)->nullable('true')->default(NULL);
            $table->string('carbs', 15)->nullable('true')->default(NULL);
            $table->string('sugar', 15)->nullable('true')->default(NULL);
            $table->string('protein', 15)->nullable('true')->default(NULL);
            $table->string('salt', 15)->nullable('true')->default(NULL);
            $table->string('traces', 255)->nullable('true')->default(NULL);
            $table->integer('article_id')->nullable('true')->default(NULL);
            $table->integer('partner_id')->nullable('true')->default(NULL);
            $table->integer('store_id')->nullable('true')->default(NULL);
            $table->string('burn_kj')->nullable('true')->default(NULL);
            $table->string('burn_kcal')->nullable('true')->default(NULL);
            $table->string('weight')->nullable('true')->default(NULL);
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
        Schema::dropIfExists('_artikel');
    }
}
