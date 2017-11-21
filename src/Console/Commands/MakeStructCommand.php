<?php

// Test Push for Packgist

namespace Skeleton\Generator\Console\Commands;

use Illuminate\Console\Command;

class MakeStructCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:all {name : The common class name to be used in each part of the structure}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a structure';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $structName = $this->argument('name');

        $this->call('makefull:controller', [
            'name' => $structName
        ]);

        $this->call('makefull:service', [
            'name' => $structName
        ]);

        $this->call('makefull:repository', [
            'name' => $structName
        ]);

        $this->call('makefull:routes', [
            'name' => $structName
        ]);

        $this->call('makefull:model', [
            'name' => $structName
        ]);

        $this->call('makefull:migration', [
            'name' => $structName
        ]);

        $this->line('Run php artisan migrate');
    }
}
