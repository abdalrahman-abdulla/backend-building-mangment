<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('statistics')->nullable()->default(false);
            $table->boolean('buildings')->nullable()->default(false);
            $table->boolean('revenues')->nullable()->default(false);
            $table->boolean('work_stages')->nullable()->default(false);
            $table->boolean('money')->nullable()->default(false);
            $table->boolean('notifications')->nullable()->default(false);
            $table->boolean('users')->nullable()->default(false);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
