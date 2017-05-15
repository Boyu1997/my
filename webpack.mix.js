const { mix } = require('laravel-mix')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.options({
  extractVueStyles: true
})
  .autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
    bootstrap: ['bootstrap'],
    tether: ['window.tether', 'tether', 'Tether']
  })
  .js('resources/assets/js/app.js', 'public/js')
  .sourceMaps()
  .extract(['jquery', 'tether', 'bootstrap', 'lodash', 'axios', 'vue', 'element-ui', 'chart.js', 'hchs-vue-charts'])
  // .sass('resources/assets/sass/app.scss', 'public/css').sourceMaps()

  // mix.webpackConfig({
  //     resolve: {
  //         modules: [
  //             path.resolve(__dirname, 'resources/assets/js')
  //         ]
  //     }
  // })
