<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticles201508121959 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->tinyInteger('type')->unsigned()->default(1);
            $table->string('title', 256)->default('');
            $table->text('content')->default('');
            $table->integer('order')->default(0);
            $table->tinyInteger('display')->default(1);
            $table->integer('release_time')->unsigned()->default(0);

            $table->integer('created_at')->unsigned();
            $table->integer('updated_at')->unsigned();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
