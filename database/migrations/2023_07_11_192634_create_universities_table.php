<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable( );
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->text('gps')->nullable();
            $table->string('ranking')->nullable();
            $table->text('scholarship')->nullable();
            $table->text('waiver')->nullable();
            $table->string('department_id')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->integer('students')->nullable();
            $table->integer('award')->nullable();
            $table->integer('graduate')->nullable();
            $table->integer('faculties')->nullable();
            $table->foreignId('user_id');
            $table->integer('status')->default(1);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->decimal('ssc')->nullable();
            $table->decimal('hsc')->nullable();
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
        Schema::dropIfExists('universities');
    }
}
