const mix = require('laravel-mix');
const path = require('path');

const alias = {
  '@': path.resolve(__dirname, 'resources/js'),
};

mix
  .vue()
  .alias(alias)
  .js('resources/scripts/app.ts', 'dist')
  .setPublicPath('public')
  .postCss('resources/styles/app.css', 'public/css', [require('tailwindcss')]);

mix.browserSync('http://localhost:10044');

mix.webpackConfig({
  resolve: {
    extensions: ['.vue', '.ts', '.js'],
  },
  module: {
    rules: [
      {
        test: /\.ts$/,
        loader: 'ts-loader',
        exclude: /node_module/,
        options: {appendTsSuffixTo: [/\.vue$/]},
      },
    ],
  },
});
