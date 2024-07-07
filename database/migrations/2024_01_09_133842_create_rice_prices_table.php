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
        Schema::create('rice_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('riceprice_date')->comment('วันที่นำเข้า');
            $table->date('rice_date')->comment('วันที่มารับข้าว');
            $table->string('riceprice_rice')->comment('พันธ์ข้าว');
            $table->string('riceprice_quantity')->comment('กระสอบข้าว');
            $table->float('riceprice_weight')->comment('น้ำหนัก');
            $table->integer('riceprice_price')->comment('ราคา');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rice_prices');
    }
};
