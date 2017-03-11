<?php

use Core\Frame\Abstracts\Migration;
use Illuminate\Database\Schema\Blueprint;

class TemplateTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_templates', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('name', 50)->comment('模板名称');
            $table->string('path', 200)->comment('模板路径');
            $table->integer('rule_group_id')->comment('规则组id');
            $table->timestamps();
        });
    }
}
