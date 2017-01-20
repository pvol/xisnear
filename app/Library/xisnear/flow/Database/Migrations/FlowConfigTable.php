<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class ConfigTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flow_configs', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('title')->comment('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
