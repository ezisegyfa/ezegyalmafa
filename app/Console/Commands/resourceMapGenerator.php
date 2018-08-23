<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class resourceMapGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:resources-map';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the resources_map.json file for laravel-code-generator based on database table names';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $resourceMapFile = fopen(base_path() . "\\resources\\laravel-code-generator\\sources\\resources_map.json", "w");
        fwrite($resourceMapFile, $this->getResourceMapFromDatabaseTables());
        fclose($resourceMapFile);
    }

    protected function getResourceMapFromDatabaseTables()
    {
        $resources = array();
        foreach (getDatabaseTableNames() as $tableName) {
            $modelName = str_singular(camel_case($tableName));
            array_push($resources, (object)[
                'model-name' => $modelName,
                'table-name' => $tableName,
                'table-exists' => true,
                'with-migration' => true
            ]);
        }
        return json_encode($resources, JSON_PRETTY_PRINT);
    }

}
