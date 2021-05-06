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
            $table->id();
            $table->foreignId('shop_id')->constrained()->onDelete('cascade');
            $table->string('slug', 150)->unique()->nullable();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('keywords')->index()->nullable();
            $table->unsignedDecimal('price');
            $table->unsignedDecimal('old_price');
            $table->unsignedSmallInteger('qty');
            $table->string('image')->nullable();
            $table->boolean('approved')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
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
