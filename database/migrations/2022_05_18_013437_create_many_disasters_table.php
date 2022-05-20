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
        Schema::create('many_disasters', function (Blueprint $table) {
            $table->foreignId('disaster_id')->constrained('disasters');
            $table->foreignId('disaster_type_id')->constrained('disaster_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('many_disasters');
    }
};
