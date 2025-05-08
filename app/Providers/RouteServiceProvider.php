<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para o arquivo de rotas da API.
     *
     * @var string
     */
    protected $apiNamespace = 'App\\Http\\Controllers\\API';

    /**
     * Registra os serviços.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Registra as rotas para a aplicação.
     *
     * @return void
     */
    public function boot()
    {
        // Carregar as rotas da API
        $this->mapApiRoutes();
    }

    /**
     * Definir as rotas para a API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api') 
            ->middleware('api') 
            ->namespace($this->apiNamespace) 
            ->group(base_path('routes/api.php')); 
    }
}
