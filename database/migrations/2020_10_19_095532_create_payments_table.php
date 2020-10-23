<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_name');
            $table->string('work_stage'); 
            $table->unsignedBigInteger('payment_money');
            $table->date('payment_date');
            $table->date('completion_payment_date');
            $table->date('penultimate_payment_date');
            $table->unsignedBigInteger('amount_paid')->nullable();
            $table->date('paid_date')->nullable();
            $table->unsignedBigInteger('building_id');
            $table->timestamps();

             $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
