<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('password',100);
            $table->string('email',100);
            $table->integer('phone');
            $table->dateTime('end_date')->nullable();
            $table->string('street',100);
            $table->integer('no_flat');
            $table->integer('no_flour');
            $table->integer('status')->default(0);
            $table->integer('no_build')->nullable();
            $table->foreignId('package_id')->constrained();
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
        Schema::dropIfExists('subscribers');
    }
}
