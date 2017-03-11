<?php

use Core\Frame\Abstracts\Migration;
use Illuminate\Database\Schema\Blueprint;

class FlowProjectTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_flow_projects', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->integer('pid')->default(0)->comment('parent id');
            $table->string('name', 50)->comment('project name');
            $table->string('dispaly_name', 100)->comment('project display name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
