<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->string('image')->nullable(); // kolom untuk menyimpan gambar
        });
    }
    
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
    
};
