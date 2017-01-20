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
            $table->tinyInteger('project_id')->comment('project id');
            $table->tinyInteger('config_id')->comment('flow config id');
            $table->tinyInteger('step')->comment('current step');
            $table->tinyInteger('status')->comment('current status');
            $table->string('accepted_users', 255)->comment('accepted users');
            $table->string('accepted_roles', 255)->comment('accepted roles');
            $table->integer('created_user')->comment('created user');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
