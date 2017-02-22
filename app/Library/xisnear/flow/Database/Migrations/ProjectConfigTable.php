<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProjectConfigTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flow_project_configs', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('project_id')->comment('项目id');
            $table->string('title')->comment('标题');
            $table->string('actions')->comment('可以执行的动作');
            $table->string('roles')->comment('可以执行的角色');
            $table->string('conditions')->comment('可以执行的条件');
            $table->tinyInteger('dispatch_type')->comment('派单类型');
            $table->string('template')->comment('模板');
            $table->tinyInteger('template_type')->comment('模板类型');
            $table->smallInteger('sortby')->comment('排序号');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
