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
        Schema::create('product', function (Blueprint $table) {
            $table->id('pid');
            $table->string('pname');
            $table->string('pimg');
            $table->integer('pprice');
            $table->string('pdesc');
            $table->unsignedBigInteger('catid');
            $table->foreign('catid')->references('catid')-> on('product_category');
            $table->boolean('status');
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
        Schema::dropIfExists('product');
    }
};
