<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_noacc', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->integer('cusid')->unsigned();
            $table->integer('staff')->unsigned()->nullable();
            $table->float('pay');
            $table->string('see',50)->nullable();
            $table->string('payment',50);
            $table->string('delivery',50);
            $table->timestamps();
            $table->foreign('cusid')
                  ->references('cus_id')->on('customer_noacc')
                  ->onDelete('cascade');
            $table->foreign('staff')
                ->references('user_id')->on('user')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_noacc');
    }
};
