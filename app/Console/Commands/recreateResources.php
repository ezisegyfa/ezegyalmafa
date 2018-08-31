<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;

class recreateResources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recreate-resources';

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
        $this->deleteCodeGeneratorJsonFiles();
        $this->call('make:resources-map');
        $this->call('create:mapped-resources', ['--force' => true]);
    }

    public function deleteCodeGeneratorJsonFiles()
    {
        $fileUrls = glob(base_path() . '\\resources\\laravel-code-generator\\sources\\*.json');
        foreach ($fileUrls as $url) {
            chmod($url, 0775);
            unlink($url);
        }
    }
}
