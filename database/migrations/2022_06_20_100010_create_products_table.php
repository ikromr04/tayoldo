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
      $table->string('title');
      $table->string('slug')->unique();
      $table->string('img')->nullable();
      $table->text('description')->nullable();
      $table->bigInteger('view_rate')->default(0);
      $table->string('prescription');
      $table->integer('release_form_id');
      $table->integer('category_id');
      $table->string('gain_url')->nullable();
      $table->text('content')->nullable();
      $table->string('instruction')->nullable();
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
