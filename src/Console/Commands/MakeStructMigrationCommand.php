<?php

namespace Skeleton\Generator\Console\Commands;

class MakeStructMigrationCommand extends StructCommand
{
	/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makefull:migration {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a populated migration';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $structName = ucfirst($this->argument('name'));
        $plural = str_plural($structName);
        $stubClassName = ucfirst($plural);

        $path = base_path() . '/database/migrations/' . date('Y_m_d') . '_000000_create_' . strtolower($plural) . '_table.php';

        $stub = 'migration';

        $changes = array(
            'class' => $structName
            , 'table' => strtolower($plural)
            , 'stubClass' => $stubClassName
        );

        $this->build($stub, $path, $changes);
    }
}