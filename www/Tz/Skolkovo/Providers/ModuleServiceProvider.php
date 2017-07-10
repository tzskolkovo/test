<?php

namespace Tz\Skolkovo\Providers;

use Caffeinated\Modules\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Prettus\Repository\Providers\RepositoryServiceProvider;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Barryvdh\Debugbar\Facade as DebugbarFacade;
use Collective\Html\HtmlServiceProvider;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'skolkovo');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'skolkovo');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'skolkovo');

        Blade::directive('formatPrice', function ($expression) {
            return "<?php echo number_format($expression, 0, '.', ' '); ?>";
        });
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $loader = AliasLoader::getInstance();
        if (env('APP_DEBUG')) {
            $this->app->register(DebugbarServiceProvider::class);
            $loader->alias('Debugbar', DebugbarFacade::class);
        }
        $this->app->register(HtmlServiceProvider::class);
        $loader->alias('Form', FormFacade::class);
        $loader->alias('Html', HtmlFacade::class);
        $this->app->register(RepositoryServiceProvider::class);

        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
