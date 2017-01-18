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
            $table->tinyInteger('flow_id')->comment('flow id');
            $table->tinyInteger('template_id')->comment('template id');
            $table->string('note')->comment('note');
            $table->integer('created_user')->comment('created user');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
