<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // For associating with users
            $table->unsignedBigInteger('blog_id'); // For associating with posts
            $table->unsignedBigInteger('parent_id')->nullable(); // For replies
            $table->text('content');
            $table->tinyinteger('status')->default(1);
            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            // $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
