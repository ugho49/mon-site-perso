// Load plugins
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify');

// Styles
gulp.task('styles', function() {
  return gulp.src('./assets/css/**/*.scss')
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(autoprefixer('last 2 version'))
      .pipe(concat('style.min.css'))
      .pipe(minifycss())
      .pipe(gulp.dest('./public/css'))
      .pipe(notify({ message: 'Styles task complete' }));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src('./assets/js/**/*.js')
      .pipe(rename({ suffix: '.min' }))
      .pipe(uglify())
      .pipe(gulp.dest('./public/js'))
      .pipe(notify({ message: 'Scripts task complete' }));
});

// Default task
gulp.task('default', function() {
  gulp.start('styles', 'scripts');
});

// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('./assets/css/**/*.scss', ['styles']);

  // Watch .js files
  gulp.watch('./assets/js/**/*.js', ['scripts']);

});
