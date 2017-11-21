<?php

namespace Skeleton\Generator\Console\Commands;

class MakeStructServiceCommand extends StructCommand
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makefull:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a populated service';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $structName = ucfirst($this->argument('name'));

        $path = $this->getAppBase() . '/Services/' . $structName . 'Service.php';
        $stub = 'service';

        $changes = array(
            'class' => $structName,
            'variable' => strtolower($structName)
        );

        $this->build($stub, $path, $changes);
    }
}