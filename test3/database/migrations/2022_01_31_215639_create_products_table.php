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
            $table->string('bar_code')->unique();
            $table->foreignId('shop_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->string('thumbnail')->nullable();
            $table->text('description');
            $table->boolean('is_verified')->default(false);
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('products');
    }
}
