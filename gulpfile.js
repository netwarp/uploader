const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
//require('vue-resource');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir((mix) => {
 	mix.webpack('app.js');
	mix.sass('front/index.scss', 'public/css/front/index.css');
});
