<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class StepTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flow_steps', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->tinyInteger('flow_id')->comment('流程id');
            $table->integer('step')->comment('步骤id');
            $table->tinyInteger('status')->comment('当前状态');
            $table->string('extdata')->comment('相关数据');
            $table->integer('created_user')->comment('创建人');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
