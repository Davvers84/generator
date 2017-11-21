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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->buildBaseRepository();
        $this->buildRepositoryInterface();
        $this->buildRepository();
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
        $structName = ucfirst($this->argument('name'));
        $path = $this->getAppBase() . '/Repositories/' . $structName . '/' . $structName . 'RepositoryInterface.php';
        $stub = 'repository-interface';
        $changes = array(
            'class' => $structName
        );

        $this->build($stub, $path, $changes);
    }

    public function buildRepository()
    {
        $structName = $this->argument('name');
        $path = $this->getAppBase() . '/Repositories/' . $structName . '/' . $structName . 'Repository.php';
        $stub = 'repository';
        $changes = array(
            'class' => $structName
        );

        $this->build($stub, $path, $changes);
    }
}