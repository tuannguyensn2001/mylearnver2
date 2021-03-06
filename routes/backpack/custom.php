<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('course', 'CourseCrudController');
    Route::crud('lesson', 'LessonCrudController');
    Route::crud('chapter', 'ChapterCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('content', 'ContentCrudController');
    Route::crud('level', 'LevelCrudController');
    Route::crud('status', 'StatusCrudController');
    Route::crud('tag', 'TagCrudController');
    Route::crud('type', 'TypeCrudController');
}); // this should be the absolute last line of this file