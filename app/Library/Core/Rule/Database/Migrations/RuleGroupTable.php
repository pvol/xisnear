<?php

use Core\Frame\Abstracts\Migration;
use Illuminate\Database\Schema\Blueprint;

class RuleGroupTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        $this->table('x_rule_groups', function(Blueprint $table) {
            $table->create();
            $table->increments('id');
            $table->string('rules', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
