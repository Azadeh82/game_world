<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description_courte');
            $table->text('description_longue');
            $table->float('prix');
            $table->string('image');
            $table->integer('stock');
            $table->float('note');
            $table->timestamps();

            $table->unsignedBigInteger('gamme_id');
            $table->foreign('gamme_id')->references('id')->on('gammes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
