<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class UserTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_auth_users', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('name', 100);
            $table->string('display_name', 100);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('remember_token', 100);
            $table->timestamps();
        });
    }
}
