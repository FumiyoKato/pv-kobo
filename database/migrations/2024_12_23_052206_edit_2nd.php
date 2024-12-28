<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Edit2nd extends Migration
{

    public function up()
    {
        if (Schema::hasColumn('users', 'created_at')) {
            Schema::table('users', function (Blueprint $table) {
                DB::statement('ALTER TABLE users CHANGE created_at registered_at TIMESTAMP NULL');
            });
        }
        
        if (Schema::hasColumn('users', 'updated_at')) {
            Schema::table('users', function (Blueprint $table) {
                DB::statement('ALTER TABLE users CHANGE updated_at revised_at TIMESTAMP NULL');
            });
        }
    }
    
    public function down()
    {
        if (Schema::hasColumn('users', 'registered_at')) {
            Schema::table('users', function (Blueprint $table) {
                DB::statement('ALTER TABLE users CHANGE registered_at created_at TIMESTAMP NULL');
            });
        }
    
        if (Schema::hasColumn('users', 'revised_at')) {
            Schema::table('users', function (Blueprint $table) {
                DB::statement('ALTER TABLE users CHANGE revised_at updated_at TIMESTAMP NULL');
            });
        }
    }

};