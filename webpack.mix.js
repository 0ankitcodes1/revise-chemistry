const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/')
.babel(['public/js/app.js'], 'public/js/app.es5.js')
.sass('resources/sass/app.scss', 'public/css/');


mix.browserSync(
    {
        proxy: 'http://127.0.0.1:8000'
    }
);