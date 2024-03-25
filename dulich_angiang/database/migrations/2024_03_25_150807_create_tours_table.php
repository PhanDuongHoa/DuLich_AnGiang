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
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->string('tentour');
            $table->text('motatour')->nullable();
            $table->decimal('gia', 8, 2);
            $table->date('ngaybatdau');
            $table->date('ngayketthuc');
            $table->string('diemxuatphat');
            $table->integer('soluongnguoi');
            //$table->string('hinhanh')->nullable();
            $table->unsignedBigInteger('doitac_id');
            $table->foreign('doitac_id')->references('id')->on('doitac');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour');
    }
};
