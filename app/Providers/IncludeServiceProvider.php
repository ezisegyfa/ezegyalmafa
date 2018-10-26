<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IncludeServiceProvider extends ServiceProvider
{
    /**
     * register the service provider
     *
     * @return void
     */
    public function register()
    {
        require_once(str_replace('\\', '/', app_path() . '/Helpers/PathMethods.php'));
        //var_dump('Loaded helper methods:');
        $this->registerDirectoryContent(join_paths(app_path(), config('helpers.directory', 'Helpers')));
    }

    protected function registerDirectoryContent(string $directoryUrl)
    {
        $this->registerSubDirectoriyContents($directoryUrl);
        $fileUrls = glob(join_paths($directoryUrl, '*.php'));
        foreach ($fileUrls as $fileUrl)
            if(file_exists($fileUrl)) {
                //var_dump($fileUrl);
                require_once($fileUrl);
            }
    }

    protected function registerSubDirectoriyContents(string $directoryUrl)
    {
        $directoryUrls = glob(join_paths($directoryUrl, '*'), GLOB_ONLYDIR);
        foreach ($directoryUrls as $directoryUrl)
            $this->registerDirectoryContent($directoryUrl);
    }

    /**
     * boot the service provider
     *
     * @return void
     */
    public function boot()
    {
        //publish configuration
        $this->publishes([
            __DIR__ . '/config/helpers.php' => config_path('helpers.php'),
        ], 'config');
    }
}
