<?php

declare(strict_types=1);

namespace laravelgpt\DhruFusion\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallDhruFusion extends Command
{
    protected $signature = 'dhru:install';
    protected $description = 'Install and configure DhruFusion for your Laravel version and frontend stack';

    public function handle()
    {
        $laravelVersion = $this->choice('Select your Laravel version', ['10', '11', '12'], 2);
        $frontend = $this->choice('Select your frontend stack', ['Blade', 'Livewire', 'React', 'Vue.js', 'Inertia.js', 'API-only'], 0);

        $this->info("Configuring for Laravel $laravelVersion with $frontend frontend...");

        $stubPath = __DIR__ . "/../../stubs/" . strtolower(str_replace(['.', ' '], '', $frontend));
        $targetPath = base_path('resources/views/dhru');

        (new Filesystem)->ensureDirectoryExists($targetPath);
        (new Filesystem)->copyDirectory($stubPath, $targetPath);

        // Publish config
        $this->callSilent('vendor:publish', [
            '--provider' => 'laravelgpt\DhruFusion\DhruServiceProvider',
            '--tag' => 'config',
        ]);
        $this->info('Config file published!');

        // Optionally run migrations
        if ($this->confirm('Would you like to run migrations now?', true)) {
            $this->call('migrate');
        }

        $this->info('DhruFusion stubs published!');
        $this->info('You may now customize your views/components as needed.');
    }
} 