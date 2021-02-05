<?php

namespace App\Providers;

use App\Repositories\Chapter\ChapterRepository;
use App\Repositories\Chapter\ChapterRepositoryInterface;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Lesson\LessonRepository;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\Status\StatusRepository;
use App\Repositories\Status\StatusRepositoryInterface;
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
        $this->app->singleton(CourseRepositoryInterface::class,CourseRepository::class);
        $this->app->singleton(ChapterRepositoryInterface::class,ChapterRepository::class);
        $this->app->singleton(StatusRepositoryInterface::class,StatusRepository::class);
        $this->app->singleton(LessonRepositoryInterface::class,LessonRepository::class);
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
