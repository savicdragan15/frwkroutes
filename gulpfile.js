/* required methods*/
var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var browserSync = require('browser-sync').create();

/*tasks*/
gulp.task('sass', function () {
    return gulp.src('resources/sass/**/*.scss') // Gets all files ending with .scss in resources/sass and children dirs
        .pipe(sass())
        .pipe(gulp.dest('views/test_theme/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('browserSync', function() {
    browserSync.init({
         proxy: "http://localhost/frwkroutes"
     });
})

gulp.task('watch', ['browserSync', 'sass'],function () {
    gulp.watch('resources/sass/**/*.scss', ['sass']);
    gulp.watch('views/**/**.php', browserSync.reload);
});
