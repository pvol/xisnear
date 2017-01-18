<?php

use Xisnear\Frame\Migration;
use Illuminate\Database\Schema\Blueprint;

class TemplateTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flow_templates', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('title')->comment('title');
            $table->string('rules')->comment('rules');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
