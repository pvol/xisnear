<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class RuleTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_rules', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('fact', 255);
            $table->string('compare', 50);
            $table->string('expect', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
