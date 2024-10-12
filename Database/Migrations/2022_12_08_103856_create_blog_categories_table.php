<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_id')->default(0);
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('banner')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('page_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description', 512)->nullable();
            $table->string('canonical', 512)->nullable();
            $table->text('schema')->nullable();
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
        Schema::dropIfExists('blog_categories');
    }
};
