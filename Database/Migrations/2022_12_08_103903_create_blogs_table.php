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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('banner')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('short_text')->nullable();
            $table->longText('body')->nullable();
            $table->string('small_image')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('page_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description', 512)->nullable();
            $table->string('canonical', 512)->nullable();
            $table->text('schema')->nullable();
            $table->unsignedBigInteger('visit')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('blog_categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
