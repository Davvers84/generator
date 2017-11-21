<?php

namespace Skeleton\Generator\Console\Commands;

class MakeStructRoutesCommand extends StructCommand
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makefull:routes {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make or add to routes';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $structName = $this->argument('name');

        $this->handleWebRoutes($structName);
        $this->handleApiRoutes($structName);
    }

    protected function handleWebRoutes($structName)
    {
        $path = base_path() . '/routes/web.php';

        $stub = array(
            'new' => 'web-routes'
            , 'appends' => 'web-routes-appends'
        );

        $this->build($stub, $path, array(), true);
    }

    protected function handleApiRoutes($structName)
    {
        $structName = ucfirst($structName);

        $path = base_path() . '/routes/api.php';

        $stub = array(
            'new' => 'api-routes-resource'
            , 'appends' => 'api-routes-resource-appends'
        );

        $changes = array(
            'route' => strtolower($structName),
            'struct' => $structName,
            'controller' => $structName . 'Controller'
        );

        $this->build($stub, $path, $changes, true);
    }
}