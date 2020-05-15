<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 255);
            $table->char('image', 255);
            $table->string('description');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('type_id');
            $table->smallInteger('new_product');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_id')
                  ->references('id')->on('types')
                  ->onDelete('cascade');
            $table->foreign('company_id')
                  ->references('id')->on('companies')
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
        Schema::dropIfExists('products');
    }
}
