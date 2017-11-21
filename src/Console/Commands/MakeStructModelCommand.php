<?php

namespace Skeleton\Generator\Console\Commands;

class MakeStructModelCommand extends StructCommand
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makefull:model {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a model';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $structName = ucfirst($this->argument('name'));

        $path = $this->getAppBase() . '/Models/' . $structName . '.php';
        $stub = 'model';

        $changes = array(
            'class' => $structName
        );

        $this->build($stub, $path, $changes);
    }
}