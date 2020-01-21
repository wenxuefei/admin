<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('title',20)->default('')->comment('标题');
            $table->String('name',20)->default('')->comment('路由名称');
            $table->String('icon',30)->default('')->comment('图标');
            $table->String('path',30)->default('')->comment('菜单链接');
            $table->String('activeMenu',30)->default('')->comment('菜单高亮链接');
            $table->String('slug',30)->default('')->comment('权限名称');
            $table->String('component',30)->default('')->comment('组件名称');
            $table->integer('parent_id')->default(0)->comment('父级菜单');
            $table->integer('sort')->default(0)->comment('菜单排序');
            $table->tinyInteger('hidden')->default(0)->comment('菜单栏显示 0 否 1是');
            $table->tinyInteger('alwaysShow')->default(1)->comment('跟路由显示 0 否 1是');
            $table->tinyInteger('noCache')->default(0)->comment('是否缓存 0 是 1否');
            $table->tinyInteger('breadcrumb')->default(0)->comment('导航栏显示 0 否 1是');
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
        Schema::dropIfExists('menus');
    }
}
