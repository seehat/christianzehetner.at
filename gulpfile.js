var babel           = require('gulp-babel');
var gulp            = require('gulp');
var concat          = require('gulp-concat');
var rename          = require('gulp-rename');
var uglify          = require('gulp-uglify');
var cssmin          = require('gulp-cssmin');
var sass            = require('gulp-sass');
var sassGlob        = require('gulp-sass-glob');
var autoprefixer    = require('gulp-autoprefixer');
var watch           = require('gulp-watch');
var cache           = require('gulp-cache');
var batch           = require('gulp-batch');
var browserSync     = require('browser-sync').create();
var reload          = browserSync.reload;
var merge           = require('merge-stream');
var plumber         = require('gulp-plumber');
var path            = require('path');
var size            = require('gulp-size');
var webpack         = require('webpack-stream');
var favicons        = require('gulp-favicons');
var gutil           = require('gulp-util');

// Load config from package.json
var packageData = require('./package.json');
var config = packageData.gulpConfig;

gulp.task('js', function() {

  /*
  return gulp.src('site/assets/js/site.js')
  .pipe(webpack({watch: false}))
  .pipe(babel({ presets: ['env'] }))
  .pipe(gulp.dest('files/js'));
  */

  return gulp.src(config.jsIncludes)
    .pipe(concat('site.js'))
    .pipe(gulp.dest('files/js'))
    .pipe(rename('site.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('files/js'));

});

gulp.task('js-watch', ['js'], function() {
    reload();
});

gulp.task('css', function() {

  var sassStream = gulp.src('site/assets/scss/site.scss')
    .pipe(sassGlob())
    .pipe(sass({
        includePaths: ['node_modules/']
      }).on('error', sass.logError))
    .pipe(autoprefixer({
            browsers: [
                'last 2 versions',
                'IE 9',
                'IE 10',
                'IE 11'
            ],
            cascade: false
        }
    ));

  // add single css files to main css file
  var cssStream = gulp.src(config.cssIncludes);

  return merge(cssStream, sassStream)
        .pipe(concat('site.css'))
        .pipe(size({gzip: true, showFiles: true}))
        .pipe(gulp.dest('files/css'))
        .pipe(browserSync.stream())
        .pipe(rename('site.min.css'))
        .pipe(cssmin())
        .pipe(size({gzip: true, showFiles: true}))
        .pipe(gulp.dest('files/css'));

});

gulp.task("favicons", function () {
  return gulp.src(config.favicon)
    .pipe(favicons({
        pipeHTML: false,
        replace: true
    }))
    .on("error", gutil.log)
    .pipe(gulp.dest("./files/favicons/"));
});


gulp.task('default', [
  'css',
  'js',
  'favicons'
]);

gulp.task('watch', [], function() {

    browserSync.init({
        proxy: path.basename(__dirname) + ".test",
        open: false,
        notify: false
    });

    gulp.watch('site/bricks/**/*.scss', ['css']);
    gulp.watch('site/bricks/**/*.css', ['css']);
    gulp.watch('site/bricks/**/*.js', ['js-watch']);
    gulp.watch('site/assets/scss/site.scss', ['css']);
    gulp.watch('site/assets/scss/**/*.scss', ['css']);
    gulp.watch('site/assets/js/site.js', ['js-watch']);

    gulp.watch("site/**/*.{php,yml}").on("error", gutil.log).on('change', reload);
    gulp.watch("content/**/*.txt").on("error", gutil.log).on('change', reload);
});
