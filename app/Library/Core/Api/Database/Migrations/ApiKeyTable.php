<?php

use Core\Frame\Abstracts\Migration;
use Illuminate\Database\Schema\Blueprint;

class ApiKeyTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_api_keys', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('name', 100)->comment('渠道名');
            $table->tinyInteger('status')->comment('当前状态');
            $table->string('public_key', 255)->comment('公钥');
            $table->string('private_key', 255)->comment('私钥');
            $table->string('ext', 255)->comment('其他信息');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
