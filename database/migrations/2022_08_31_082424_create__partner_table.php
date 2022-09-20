<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_partner', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Firstname')->nullable('true')->default(NULL);
            $table->string('Givenname')->nullable('true')->default(NULL);
            $table->string('Displayname')->nullable('true')->default(NULL);
            $table->integer('partner_id')->nullable('true')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_partner');
    }
}
