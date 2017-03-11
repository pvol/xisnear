<?php

/**
 * core
 * 
 * @version 1.0
 * @package App\Console
 */

namespace App\Console\Commands;

use Core\Frame\Abstracts\Command;

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
 */
class Seed extends Command {

    /** @var migration directory */
    protected $direcory;
    
    /** @var migration files */
    protected $files = [];
    
    /** @var migration classes */
    protected $classes = [];

    public function __construct() {
        $this->direcory = [
            _base_path() . '/database/seeds/',
        ];
    }

    /**
     * command start.
     */
    public function handle() {
        // get file path from directory
        $this->getSeedPath();
        
        // include files and get instances
        $this->includeFiles();

        // run instances
        $this->run();
    }
    
    /**
     * get migration files from directorys.
     */
    private function getSeedPath(){
        global $argv;
        if(isset($argv[2])){
            $this->files[] = [
                'filepath' => _base_path() . '/database/seeds/', 
                'name' => $argv[2] . '.php'
            ];
            return;
        }
        foreach($this->direcory as $directory){
            $this->getSeedPathFromDir($directory);
        }
    }
    
    /**
     * get seed files from directory.
     */
    private function getSeedPathFromDir($directory){
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
            $class->run();
        }
    }

}
