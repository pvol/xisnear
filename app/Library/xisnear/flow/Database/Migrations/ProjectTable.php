<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProjectTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flow_projects', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('name', 50)->comment('project name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
