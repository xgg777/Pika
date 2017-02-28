<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('author', 255);
            $table->text('content');
            $table->text('markdown_source');
            $table->integer('user_id');
            $table->integer('is_markdown');
            $table->integer('is_recommend');

            $table->tinyInteger('type')->default(1)->comment('1code 2word');
            $table->tinyInteger('on_line')->default(1)->comment('1下线 2上线');

            $table->unsignedInteger('views_count')->default(0)->comment('浏览总数');
            $table->unsignedInteger('comment_count')->default(0)->comment('评论总数');

            $table->tinyInteger('sort')->default(1)->comment('排序');

            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 60);
            $table->string('mark', 60);
            $table->timestamps();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('article_id')->references('id')->on('articles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['article_id', 'tag_id']);
        });


        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 255);
            $table->string('email', 255);
            $table->text('content');
            $table->integer('article_id');
            $table->tinyInteger('on_line')->default(2)->comment('1下线 2上线');
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
        //
        Schema::drop('articles');
        Schema::drop('comments');
        Schema::drop('article_tag');
        Schema::drop('tags');

    }
}
