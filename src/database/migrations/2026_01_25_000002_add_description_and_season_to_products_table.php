<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable()->after('price');
            $table->foreignId('season_id')->nullable()->after('image')->constrained('seasons');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['season_id']);
            $table->dropColumn('season_id');
            $table->dropColumn('description');
        });
    }
};
