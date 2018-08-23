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
        $this->registerDirectoryContent(app_path() . '\\Helpers');
    }

    protected function registerDirectoryContent(string $directoryUrl)
    {
        $this->registerSubDirectoriyContents($directoryUrl);
        $fileUrls = glob($directoryUrl . '\\*.php');
        foreach ($fileUrls as $fileUrl)
            if(file_exists($fileUrl))
                require_once($fileUrl);
    }

    protected function registerSubDirectoriyContents(string $directoryUrl)
    {
        $directoryUrls = glob($directoryUrl . '\\*' , GLOB_ONLYDIR);
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
