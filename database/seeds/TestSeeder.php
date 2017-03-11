<?php

use Illuminate\Database\Eloquent\Model;
use Core\Frame\Abstracts\Seeder;

class TestSeeder extends Seeder
{

    public function run() {

        Model::unguard();


        Model::reguard();
    }

}
