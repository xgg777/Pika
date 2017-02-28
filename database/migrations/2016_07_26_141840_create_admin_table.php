<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('parent_id')->default(0)->comment('父级菜单ID');
            $table->string('icon', 50)->comment('菜单图标');
            $table->string('name', 50)->comment('菜单名称');
            $table->string('route', 50)->comment('菜单路由');
            $table->string('description', 50)->comment('菜单描述');
            $table->tinyInteger('sort')->default(0)->comment('菜单排序');
            $table->tinyInteger('hide')->default(0)->comment('是否隐藏');
            $table->timestamps();
        });

        Schema::create('menu_permission', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('permission_id')->unsigned();

            $table->foreign('menu_id')->references('id')->on('menus')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'menu_id']);
        });

        //操作
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group')->comment('操作分组');
            $table->string('name')->comment('操作名称');
            $table->string('action')->comment('操作路由');
            $table->string('description')->comment('操作描述');
            $table->tinyInteger('state')->default(1)->comment('是否禁用');
            $table->timestamps();
        });

        Schema::create('action_permission', function (Blueprint $table) {
            $table->integer('action_id')->unsigned();
            $table->integer('permission_id')->unsigned();

            $table->foreign('action_id')->references('id')->on('actions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'action_id']);
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
        Schema::drop('menus');
        Schema::drop('menu_permission');
        Schema::drop('actions');
        Schema::drop('action_permission');
    }
}
