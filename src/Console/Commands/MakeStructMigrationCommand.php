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
        $structName = str_plural(ucfirst($this->argument('name')));

        $pieces = preg_split('/(?=[A-Z])/', $structName);
        $lowerMigrationName = strtolower(implode('_', $pieces));
        $tableName = strtolower(preg_replace('/\_/', '', $lowerMigrationName, 1));

        $path = base_path() . '/database/migrations/' . date('Y_m_d') . '_000000_create' . $lowerMigrationName . '_table.php';

        $stub = 'migration';

        $changes = array(
            'class' => $structName
            , 'table' => $tableName
        );

        $this->build($stub, $path, $changes);
    }
}