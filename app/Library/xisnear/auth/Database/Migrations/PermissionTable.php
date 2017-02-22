<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class PermissionTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_auth_permissions', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('pid')->nullable(false)->default(0)->comment('父id');
            $table->string('url', 255)->nullable(false)->default('')->comment('地址');
            $table->string('name', 255)->nullable(false)->default('')->comment('菜单名');
            $table->tinyInteger('is_menu')->nullable(false)->default(-1)->comment('是否菜单');
            $table->string('power', 255)->nullable(false)->default('')->comment('后缀匹配正则');
            $table->timestamps();
            
            $table->unique('url', 'url_unique');   
        });
    }
}
