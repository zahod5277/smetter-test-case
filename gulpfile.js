var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    prefixer = require('gulp-autoprefixer');

var paths = {src: 'dist/', dist: 'assets/'},
    src = {
        sass: paths.src + 'scss/**/**/*.+(scss|sass|less)',
        js: paths.src + 'js/**/*.js',
    },
    dist = {
        sass: paths.dist + 'css',
        js: paths.dist + 'js',
    };

gulp.task('sass', function () {
    return gulp.src(['dist/scss/app.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('app.min.css'))
        .pipe(prefixer())
        .pipe(gulp.dest(dist.sass));
});

gulp.task('js', function () {
    return gulp.src(['app/libs/jquery.js', 'app/libs/*/*.js', src.js])
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(dist.js));
});


//gulp.task('build', ['sass', 'js']);