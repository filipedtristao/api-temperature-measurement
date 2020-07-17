<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotifiedAtToTemperatureMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temperature_measurements', function (Blueprint $table) {
            $table->dateTime('notified_at')
                ->after('is_notifiable')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temperature_measurements', function (Blueprint $table) {
            $table->dropColumn('notified_at');
        });
    }
}
