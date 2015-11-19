/*
    https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md

    1- Install gulp globally:
    npm install --global gulp

    2- Install gulp in your project devDependencies:
    npm install --save-dev gulp

    3- Create a gulpfile.js at the root of your project

    4- Run gulp :
    gulp  OR  gulp <task> <othertask>
*/

/*
npm install gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del --save-dev
*/

// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    del = require('del');

// Styles
gulp.task('styles', function() {
  return sass('src/assets/**/*.scss', { style: 'expanded' })
    .pipe(autoprefixer('last 2 version'))
    .pipe(concat('style.min.css'))
    .pipe(minifycss())
    .pipe(gulp.dest('public_html/css'))
    .pipe(notify({ message: 'Styles task complete' }));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src('src/assets/**/*.js')
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest('public_html')) // js folder create automaticly
    .pipe(notify({ message: 'Scripts task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src('src/assets/img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('public_html/img'))
    .pipe(notify({ message: 'Images task complete' }));
});

// Clean
gulp.task('clean', function() {
  //return del(['public_html/css', 'public_html/js', 'public_html/img']);
  return del(['public_html/css', 'public_html/js']);
});

// Default task
gulp.task('default', ['clean'], function() {
  //gulp.start('styles', 'scripts', 'images');
  gulp.start('styles', 'scripts');
});

// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('src/assets/css/**/*.scss', ['styles']);

  // Watch .js files
  gulp.watch('src/assets/js/**/*.js', ['scripts']);

  // Watch image files
  //gulp.watch('src/assets/images/**/*', ['images']);

  // Create LiveReload server
  //livereload.listen();

  // Watch any files in dist/, reload on change
  //gulp.watch(['public_html/**']).on('change', livereload.changed);

});
