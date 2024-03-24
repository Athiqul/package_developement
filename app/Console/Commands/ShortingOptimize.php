<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShortingOptimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'c:p';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will optimize config route and cache files for performance';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Optimizing...');
        $this->call('optimize');

        $this->info('Clearing configuration cache...');
        $this->call('config:clear');

        $this->info('Optimization and configuration cache cleared successfully!');
    }
}
