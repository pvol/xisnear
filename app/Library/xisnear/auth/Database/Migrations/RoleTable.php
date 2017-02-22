<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class RoleTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_auth_roles', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('name', 100);
            $table->string('display_name', 100);
            $table->timestamps();
        });
    }
}
