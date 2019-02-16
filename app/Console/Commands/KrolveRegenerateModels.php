<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;

class KrolveRegenerateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'krolve:regenerate:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->deleteModelFiles();
        foreach (getDatabaseTableNames() as $tableName) {
            $this->call('krlove:generate:model', [
                'class-name' => ucfirst(camel_case(str_singular($tableName))),
                '--table-name' => $tableName,
                '--output-path' => 'Models',
                '--namespace' => 'App\\Models'
            ]);
        }
    }

    protected function deleteModelFiles()
    {
        deleteFilesFromFolder(base_path() . '\\app\\Models', 'php');
    }
}
