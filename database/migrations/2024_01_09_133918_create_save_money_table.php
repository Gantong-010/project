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
        Schema::create('save_money', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('rice_date_id');   //-> มีการเปลี่ยน rice_price_id เป็น rice_date
            $table->string('savemoney_bagc')->comment('จำนวนข้าวไก่');
            $table->string('savemoney_type')->comment('วิธีชำระเงิน');
            $table->integer('savemoney_receive')->comment('รับเงิน');
            $table->integer('savemoney_change')->comment('ทอนเงิน');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('rice_date_id')->references('id')->on('rice_prices');

            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('ricedate_id')->references('id')->on('ricedates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_money');
    }
};
