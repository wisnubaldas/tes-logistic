<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('satuan_id');
            $table->string('kd_barang');
            $table->string('nama');
            $table->string('harga');
            $table->string('gambar');
            $table->string('qr');
            $table->string('qty');
            $table->timestamps();
        });
        \DB::statement('ALTER TABLE barangs ADD searchable tsvector NULL');
        \DB::statement('CREATE INDEX barangs_searchable_index ON barangs USING GIN (searchable)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
