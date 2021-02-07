const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/module/lesson/index.js', 'public/vue/lesson').vue()
    .js('resources/js/module/admin_lesson_list/index.js','public/vue/admin_lesson_list').vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
