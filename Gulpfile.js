var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var watch = require('gulp-watch');
var refresh = require('gulp-refresh');

gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
              keepSpecialComments: 1
          }))
        .pipe(gulp.dest('./'))
        .pipe(refresh())
});

//Watch task
gulp.task('default',function() {
    refresh.listen()
    gulp.watch('sass/**/*.scss',['styles']);
});