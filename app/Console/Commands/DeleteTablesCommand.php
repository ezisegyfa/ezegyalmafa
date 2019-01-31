<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteTablesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all tables in database.';

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
        $colname = 'Tables_in_' . \DB::getDatabaseName();

        $tables = \DB::select('SHOW TABLES');

        foreach($tables as $table) {
            $droplist[] = $table->$colname;

        }
        $droplist = implode(',', $droplist);

        \DB::beginTransaction();
        //turn off referential integrity
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \DB::statement("DROP TABLE $droplist");
        //turn referential integrity back on
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        \DB::commit();

        $this->comment(PHP_EOL . "All tables were dropped" . PHP_EOL);
    }
}
