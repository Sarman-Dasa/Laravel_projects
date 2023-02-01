<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StorageCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:count
    {path : Enter Your path name}
    {--F | --folder : if you cound sub folder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'count file and Folder from path';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dir = base_path($this->argument('path')) . "/";
        $files = array_filter(glob($dir . "*"),"is_file") ?? 0;

        if($this->option('folder'))
        {
            $folder = glob($dir. "*",GLOB_ONLYDIR) ?? 0;
            return $this->info("Total File is ". count($files) . " and ". count($folder) . " Folder ");

        }
        else{
            return $this->info("Total File :". count($files));
        }
    }
}
