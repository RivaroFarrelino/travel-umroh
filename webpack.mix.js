const mix = require('laravel-mix');

// Compile JavaScript
mix.js('resources/js/app.js', 'public/js');

// Compile CSS
mix.postCss('resources/css/app.css', 'public/css', [
    // Add any PostCSS plugins here if needed
    require('postcss-import'),
    require('tailwindcss'), // If you use Tailwind CSS
    require('autoprefixer'),
]);

// Optional: Compile SASS (if you have SCSS files in your project)
mix.sass('resources/sass/app.scss', 'public/css');

// Enable versioning in production (useful for cache-busting)
if (mix.inProduction()) {
    mix.version();
}

// Enable source maps in development for easier debugging
mix.sourceMaps();
