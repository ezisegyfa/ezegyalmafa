<?php

namespace App\Console\Commands;

use CrestApps\CodeGenerator\Models\ResourceInput;
use Exception;
use Illuminate\Console\Command;
use CrestApps\CodeGenerator\Support\Config;
use CrestApps\CodeGenerator\Traits\CommonCommand;

class CreateModelsCommand extends Command
{
    use CommonCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Executes the console command.
     *
     * @return void
     */
    public function handle()
    {
        $content = $this->getFileContent($this->getMappingFile());
        $inputs = json_decode($content, true);

        if (!is_array($inputs)) {
            throw new Exception('The mapping-file does not contain a valid array.');
        }

        foreach ($inputs as $input) {
            if (array_key_exists('model-name', $input)) {
                $this->call(
                    'create:model',
                    [
                        'model-name' => $input['model-name']
                    ]
                );
            }
            else
                dd($input);

            $this->info('---------------------------------');
        }

        return $this->printInfo('All Done!');
    }

    /**
     * Gets the full name of the mapping file.
     *
     * @return string
     */
    protected function getMappingFile()
    {
        $name = Config::getDefaultMapperFileName();

        return base_path(Config::getResourceFilePath($name));
    }

    /**
     * Gets the value of a property of a givig object if exists.
     *
     * @param object $object
     * @param string $name
     * @param mix $default
     *
     * @return mix
     */
    protected function getValue($object, $name, $default = null)
    {
        if (isset($object->{$name})) {
            return $object->{$name};
        }

        return $default;
    }

    /**
     * Prints a message
     *
     * @param string $message
     *
     * @return $this
     */
    protected function printInfo($message)
    {
        $this->info($message);

        return $this;
    }

    /**
     * Ensured fields contains at least one field.
     *
     * @param array $fields
     *
     * @return $this
     */
    protected function validateField($fields)
    {
        if (empty($fields) || !isset($fields[0])) {
            throw new Exception('You must provide at least one field to generate the views!');
        }

        return $this;
    }

    /**
     * Gets a clean user inputs.
     *
     * @return CrestApps\CodeGenerator\Models\ResourceInput
     */
    protected function getCommandInput()
    {
        $input = new ResourceInput(Config::getDefaultMapperFileName());
        $input->viewsDirectory = trim($this->option('views-directory'));
        $input->perPage = intval($this->option('models-per-page'));
        $input->formRequest = $this->option('with-form-request');
        $input->controllerDirectory = $this->option('controller-directory');
        $input->controllerExtends = $this->option('controller-extends') ?: null;
        $input->withMigration = $this->option('with-migration');
        $input->force = $this->option('force');
        $input->modelDirectory = $this->option('model-directory');
        $input->primaryKey = $this->option('primary-key');
        $input->withSoftDelete = $this->option('with-soft-delete');
        $input->withoutTimeStamps = $this->option('without-timestamps');
        $input->connectionName = $this->option('connection-name');
        $input->engineName = $this->option('engine-name');
        $input->template = $this->getTemplateName();
        $input->layoutName = $this->option('layout-name') ?: 'layouts.app';
        $input->tableExists = $this->option('table-exists');
        $input->translationFor = $this->option('translation-for');
        $input->withAuth = $this->option('with-auth');
        $input->formRequestDirectory = $this->option('form-request-directory');

        return $input;
    }
}