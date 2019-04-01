<?php

namespace Skeleton\Generator\Console\Commands;

class MakeStructRepositoryCommand extends StructCommand
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makefull:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a populated repository';

    protected $structName;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->structName = ucfirst($this->argument('name'));
        $this->buildBaseRepository();
        $this->buildRepositoryInterface();
        $this->buildRepository();
        $this->registerRepository();
    }

    public function buildBaseRepository()
    {
        $path = $this->getAppBase() . '/Repositories/BaseRepository.php';
        $stub = 'base-repository';
        $changes = array();

        $this->build($stub, $path, $changes);
    }

    public function buildRepositoryInterface()
    {
        $path = $this->getAppBase() . '/Repositories/' . $this->structName . '/' . $this->structName . 'RepositoryInterface.php';
        $stub = 'repository-interface';
        $changes = array(
            'class' => $this->structName
        );

        $this->build($stub, $path, $changes);
    }

    public function buildRepository()
    {
        $path = $this->getAppBase() . '/Repositories/' . $this->structName . '/' . $this->structName . 'Repository.php';
        $stub = 'repository';
        $changes = array(
            'class' => $this->structName
        );

        $this->build($stub, $path, $changes);
    }

    public function registerRepository() {
        $codeToInsert = '
            $this->app->bind("App\\Repositories\\' . $this->structName . '\\' . $this->structName . 'RepositoryInterface", "App\\Repositories\\' . $this->structName . '\\' . $this->structName . 'Repository");
        ';

        $appServiceProvider = 'app/Providers/AppServiceProvider.php';
        $classFileContent = file_get_contents($appServiceProvider, true);

        preg_match('/function register\(.*\)\s*{/', $classFileContent, $matches, PREG_OFFSET_CAPTURE);
        $firstLinePos = strlen($matches[0][0]) + $matches[0][1];
        $newClassFileContent = substr_replace($classFileContent, $codeToInsert, $firstLinePos, 0);

        $appServiceProviderFile = fopen($appServiceProvider , 'w');
        fwrite($appServiceProviderFile, $newClassFileContent);
        fclose($appServiceProviderFile);
    }
}