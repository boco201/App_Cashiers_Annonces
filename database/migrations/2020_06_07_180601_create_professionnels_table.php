<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionnels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('category_id');
            $table->integer('user_id');
            $table->integer('pro_id');
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('premium')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('professionnels');
    }
}
