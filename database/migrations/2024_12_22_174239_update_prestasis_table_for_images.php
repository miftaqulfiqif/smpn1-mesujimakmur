<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePrestasisTableForImages extends Migration
{
    public function up()
    {
        Schema::table('prestasis', function (Blueprint $table) {
            $table->json('images')->nullable()->change();
            $table->text('konten')->change();
        });
    }

    public function down()
    {
        Schema::table('prestasis', function (Blueprint $table) {
            $table->string('images')->nullable()->change();
            $table->string('konten')->change();
        });
    }
}
