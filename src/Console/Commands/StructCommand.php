<?php

namespace Skeleton\Generator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class StructCommand extends Command
{
	/**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    protected function build($stubName, $path, $changes, $appendIfExists = false)
    {
        $alreadyExists = false;

    	if ($this->files->exists($path) && $appendIfExists === false) {
            return $this->error(ucfirst($stubName) . ' already exists!');
        } else if($appendIfExists === false) {
            $this->makeDirectory($path);
        } else {
    	    $alreadyExists = true;
        }

        if(is_array($stubName) && $alreadyExists) {
    	    $stubName = $stubName['appends'];
        } else if(is_array($stubName)) {
            $stubName = $stubName['new'];
        }

        $stub = $this->files->get(__DIR__ . '/../Stubs/' . strtolower($stubName) . '.stub');

        foreach ($changes as $key => $value) {
            $stub = str_replace('{{' . $key . '}}', $value, $stub);
        }

        if($alreadyExists) {
            $bytesWritten = $this->files->append($path, $stub);
            if ($bytesWritten === false) {
                return $this->error(ucfirst($stubName) . ' couldn\'t write to file!');
            } else {
                $this->files->append($path, "\r\n");
                $this->info(ucfirst($stubName) . ' appended to successfully.');
            }
        } else {
            $this->files->put($path, $stub);
            $this->info(ucfirst($stubName) . ' created successfully.');
        }
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }

    protected function getAppBase()
    {
    	return base_path() . '/app/';
    }
}