<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class FlowTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flows', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('project_id')->comment('项目id');
            $table->integer('step')->comment('步骤id');
            $table->tinyInteger('status')->comment('当前状态');
            $table->string('accepted_users', 255)->comment('接收人');
            $table->integer('created_user')->comment('创建人');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
