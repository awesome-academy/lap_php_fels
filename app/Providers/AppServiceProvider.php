<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Course\CourseRepositoryInterface::class,
            \App\Repositories\Course\CourseEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Lession\LessionRepositoryInterface::class,
            \App\Repositories\Lession\LessionEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Test\TestRepositoryInterface::class,
            \App\Repositories\Test\TestEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Question\QuestionRepositoryInterface::class,
            \App\Repositories\Question\QuestionEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
