<?php

/**
 * xisnear
 * 
 * @version 1.0
 * @package App\Console
 * @author xisnear <service@xisnear.com>
 */

namespace App\Console\Commands;

use Xisnear\Frame\Abstracts\Command;

/**
 * migrate
 * 
 * usage:
 * 
 * 1、php artisan migrate
 * this method will run all migrations. it will skip error migration.
 * 
 * 2、php artisan migrate MigrationFileName
 * this method will run the migration file which named MigrationFileName.
 * 
 * @author xisnear <service@xisnear.com>
 */
class Migrate extends Command {

    /** @var migration directory */
    protected $direcory;
    
    /** @var migration files */
    protected $files = [];
    
    /** @var migration classes */
    protected $classes = [];

    public function __construct() {
        $this->direcory = [
            _base_path() . '/database/migrations/',
            _core_path() . '/flow/Database/Migrations/',
            _core_path() . '/frame/Database/Migrations/',
            _core_path() . '/rule/Database/Migrations/',
            _core_path() . '/template/Database/Migrations/',
            _core_path() . '/auth/Database/Migrations/',
        ];
    }

    /**
     * command start.
     */
    public function handle() {
        // get file path from directory
        $this->getMigrationPath();
        
        // include files and get instances
        $this->includeFiles();

        // run instances
        $this->run();
    }
    
    /**
     * get migration files from directorys.
     */
    private function getMigrationPath(){
        global $argv;
        if(isset($argv[2])){
            $this->files[] = [
                'filepath' => _base_path() . '/database/migrations/', 
                'name' => $argv[2] . '.php'
            ];
            return;
        }
        foreach($this->direcory as $directory){
            $this->getMigrationPathFromDir($directory);
        }
    }
    
    /**
     * get migration files from directory.
     */
    private function getMigrationPathFromDir($directory){
        $files = scandir($directory);
        foreach($files as $file){
            if(strpos($file, '.php') !== false){
                $this->files[] = ['filepath' => $directory, 'name' => $file];
            }
        }
    }
    
    /**
     * include files and ge migration classes.
     */
    private function includeFiles(){
        foreach($this->files as $file){
            require implode('', $file);
            $class_name = $this->getClassNameFromFileName($file);
            $this->classes[$file['name']] = new $class_name();
        }
    }
    
    /**
     * get class name from file name.
     */
    private function getClassNameFromFileName($file){
        $file_name = $file['name'];
        return substr($file_name, 0, strpos($file_name, '.'));
    }
    
    /**
     * run migration
     */
    private function run(){
        foreach($this->classes as $class){
            $class->up();
        }
    }

}
