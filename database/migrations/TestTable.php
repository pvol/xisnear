<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class TestTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('test', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->timestamps();
        });
    }
}
