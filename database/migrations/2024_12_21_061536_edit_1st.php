<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Edit1st extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Add new columns
            $table -> string('address', 100) -> after('remember_token');
            $table -> string('phone', 13) -> after('address');
            $table -> string('name_incharge', 30) -> after('phone');
            $table -> string('delivery_email', 50) -> after('name_incharge');
            $table -> boolean('on_service') -> default(true);

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table -> dropColumn('address');
            $table -> dropColumn('phone');
            $table -> dropColumn('name_incharge');
            $table -> dropColumn('delivery_email');
            $table -> dropColumn('on_service');

        });
    }

};