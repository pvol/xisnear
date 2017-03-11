<?php

use Core\Frame\Abstracts\Migration;
use Illuminate\Database\Schema\Blueprint;

class PermissionRoleTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_auth_permission_role', function(Blueprint $table) {
            $table->create();
            $table->unsignedInteger('permission_id')->nullable(false)->default(0);
            $table->unsignedInteger('role_id')->nullable(false)->default(0);

            $table->primary(['permission_id', 'role_id']);
        });
    }
}
