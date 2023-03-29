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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'purchase_user_idx');
            $table->foreign('user_id', 'purchase_user_fk')->on('users')->references('id');

            $table->string('title', 200);
            $table->unsignedBigInteger('sum')->nullable();
            $table->integer('status')->comment('
            1 - created,
            2 - donated,
            3 - sended,
            4 - confirmed');
            $table->integer('send_to')->comment('order_id from site')->nullable();
            $table->string('full_name', 200);
            $table->string('sertificate_img')->nullable();

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
        Schema::dropIfExists('purchases');
    }
};
