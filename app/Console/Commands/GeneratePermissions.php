<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class GeneratePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate permissions based on routes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            if ($route->getName()) { // Pastikan route memiliki nama
                Permission::firstOrCreate(
                    ['name' => $route->getName(),
                    'guard_name' => 'web',
                ]);
            }
        }

        $this->info('Permissions generated based on routes.');
    }
}
