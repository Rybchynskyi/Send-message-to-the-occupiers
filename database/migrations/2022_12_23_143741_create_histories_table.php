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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->comment('
            1 - created,
            2 - donated,
            3 - sended,
            4 - confirmed');;

            $table->unsignedBigInteger('purchase_id');
            $table->index('purchase_id', 'history_purchase_idx');
            $table->foreign('purchase_id', 'history_purschase_fk')->on('purchases')->references('id');

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
        Schema::dropIfExists('histories');
    }
};
