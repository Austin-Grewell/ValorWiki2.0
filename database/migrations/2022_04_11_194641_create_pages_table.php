<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->boolean('agent')->default(false);
            $table->boolean('map')->default(false);
            $table->boolean('skin')->default(false);
            $table->boolean('weapon')->default(false);
            $table->string('about');
            $table->string('abilityOne')->nullable();
            $table->string('abilityTwo')->nullable();
            $table->string('abilityThree')->nullable();
            $table->string('abilityFour')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
