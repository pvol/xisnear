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
        $this->table('x_steps', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->timestamps();
        });
    }
}
