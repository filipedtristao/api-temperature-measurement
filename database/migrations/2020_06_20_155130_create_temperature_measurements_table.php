<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperatureMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperature_measurements', function (Blueprint $table) {
            $table->integer('id', true);
            $table->float('temperature');
            $table->float('min_temperature')->nullable();
            $table->float('max_temperature')->nullable();
            $table->tinyInteger('is_notifiable')->default(0);
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
        Schema::dropIfExists('temperature_measurements');
    }
}
