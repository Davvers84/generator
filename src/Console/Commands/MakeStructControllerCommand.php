<?php

namespace Skeleton\Generator\Console\Commands;

class MakeStructControllerCommand extends StructCommand
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makefull:controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a populated controller';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $structName = ucfirst($this->argument('name'));

        $path = $this->getAppBase() . '/Http/Controllers/' . $structName . 'Controller.php';

        $stub = 'controller-resource';

        $changes = array(
            'class' => $structName,
            'variable' => strtolower($structName)
        );

        $this->build($stub, $path, $changes);
    }
}