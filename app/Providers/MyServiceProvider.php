<?php

namespace App\Providers;

use App\Services\Interfaces\CommentInterface;
use App\Services\Interfaces\FreezerInterface;
use App\Services\Interfaces\FreezerProductInterface;
use App\Services\Interfaces\ProductInterface;
use App\Services\Interfaces\RecipeInterface;
use App\Services\Repositories\CommentRepository;
use App\Services\Repositories\FreezerProductRepository;
use App\Services\Repositories\FreezerRepository;
use App\Services\Repositories\ProductRepository;
use App\Services\Repositories\RecipeRepository;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app()->bind(CommentInterface::class, CommentRepository::class);
        app()->bind(ProductInterface::class, ProductRepository::class);
        app()->bind(FreezerProductInterface::class, FreezerProductRepository::class);
        app()->bind(FreezerInterface::class, FreezerRepository::class);
        app()->bind(RecipeInterface::class, RecipeRepository::class);
    }
}
