<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 //php artisan make:migration AlterTableUserAddIsAdmin 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //добавить колонку is_admin после email
        Schema::table('users', function (Blueprint $table){
            $table->boolean('is_admin')->after('email')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('is_admin');
        });
    }
};

// php artisan migrate   выполнить миграцию
