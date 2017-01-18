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
            $table->timestamps();
        });
    }
}
