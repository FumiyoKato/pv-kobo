<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forecast_units', function (Blueprint $table) {
            $table -> id('forecast_unit_id');
            $table -> string('forecast_unit_name', 50); // VARCHAR(50)
            $table -> unsignedBigInteger('user_id'); // INTEGER(8), FK
            $table -> float('pv_capacity', 12, 2) -> check('pv_capacity >= 0'); // FLOAT, [kW], 0以上
            $table -> float('pcs_capacity', 12, 2) -> check('pcs_capacity >= 0'); // FLOAT, [kW], 0以上
            $table -> unsignedTinyInteger('pcs_efficiency') -> check('pcs_efficiency BETWEEN 0 AND 100'); // INTEGER, [%], 0~100
            $table -> unsignedTinyInteger('loss_rate') -> check('loss_rate BETWEEN 0 AND 99'); // INTEGER, [%], 0~99
            $table -> unsignedSmallInteger('direction') -> check('direction BETWEEN 1 AND 360'); // INTEGER, [°], 1~360
            $table -> unsignedTinyInteger('angle') -> check('angle BETWEEN 0 AND 90'); // INTEGER, [°], 0~90
            $table -> float('latitude', 8, 6); // FLOAT
            $table -> float('longitude', 9, 6); // FLOAT
            $table -> timestamps(); // created_at, updated_at
            $table -> datetime('start_at'); // DATETIME
            $table -> datetime('end_at'); // DATETIME

            // ForeignKey constraint
            $table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forecast_units');
    }
};