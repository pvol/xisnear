<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class GroupTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_rule_groups', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('rules', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
