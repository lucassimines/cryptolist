const mix = require('laravel-mix');

mix
  .js('./resources/scripts/app.ts', 'dist')
  .vue()
  .setPublicPath('public')
  .copy('./resources/fonts/', 'public/fonts')
  .copy('./resources/favicon.ico', 'public/favicon.ico')
  .postCss('./resources/styles/app.css', 'public/css', [
    require('tailwindcss'),
  ]);

// mix.browserSync('http://localhost:3000');

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
