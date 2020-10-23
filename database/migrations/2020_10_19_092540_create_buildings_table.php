<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name'); 
            $table->string('building_no');
            $table->unsignedBigInteger('building_price');
            $table->string('client_phone');
            $table->date('delivery_date');
            $table->date('loan_date');
            $table->date('loan_receiving_date');
            $table->unsignedBigInteger('loan_price');
            $table->string('notice')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
