<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\Category;

class CategoryBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('displayCategories', function ($categories) {
            return "<?php echo app('App\Services\CategoryService')->displayCategories($categories); ?>";
        });
     }
}
