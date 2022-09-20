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
            $table->string('Firstname');
            $table->string('Givenname');
            $table->string('Displayname');
            $table->integer('partner_id');
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
