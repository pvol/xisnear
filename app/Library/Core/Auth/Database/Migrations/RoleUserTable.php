<?php

use Core\Frame\Abstracts\Migration;
use Illuminate\Database\Schema\Blueprint;

class RoleUserTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_auth_user_roles', function(Blueprint $table) {
            $table->create();
            $table->unsignedInteger('user_id')->nullable(false)->default(0);
            $table->unsignedInteger('role_id')->nullable(false)->default(0);

            $table->primary(['user_id', 'role_id']);
        });
    }
}
