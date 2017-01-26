<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class RoleUserTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_user_roles', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->timestamps();
        });
    }
}
