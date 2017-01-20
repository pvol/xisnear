<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class StepConfigTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flow_step_configs', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('title')->comment('title');
            $table->tinyInteger('dispatch')->comment('dispatch type');
            $table->string('template')->comment('template');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
