<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->index();
            $table->int('property_type')->index();
            $table->int('year_built');
            $table->int('type_id')->index();
            $table->int('agent_id')->index();
            $table->integer('home_area');
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->integer('garage');
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
        Schema::dropIfExists('property_details');
    }
}
