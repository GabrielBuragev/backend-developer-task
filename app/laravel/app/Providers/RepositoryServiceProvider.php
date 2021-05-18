<?php

namespace App\Providers;

use App\Repository\Eloquent\NoteContentRepository;
use App\Repository\Eloquent\NoteListRepository;
use App\Repository\Eloquent\NoteTextRepository;
use App\Repository\NoteContentRepositoryInterface;
use App\Repository\NoteListRepositoryInterface;
use App\Repository\NoteTextRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NoteContentRepositoryInterface::class, NoteContentRepository::class);
        $this->app->bind(NoteTextRepositoryInterface::class, NoteTextRepository::class);
        $this->app->bind(NoteListRepositoryInterface::class, NoteListRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
