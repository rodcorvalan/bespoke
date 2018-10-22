'use strict';

// Require
var gulp 		     = require('gulp');
var sass 		     = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var browserSync  = require('browser-sync').create();
var pleeease     = require('gulp-pleeease');
var watch        = require('gulp-watch');
var plumber      = require('gulp-plumber');

// Proxy URL
var URL   = 'localhost/arrocal';
var theme = 'arrocal';

//
// Style Task
//

var SASS_FILES  = ['sass/**/*.scss','!sass/style.scss'];
var DIST_FOLDER = 'dist';
var DIST_FILES = 'dist/**/*.css';
var JOIN_FILE = 'sass/style.scss';
var PROD_FOLDER = 'stylesheets';
var CSS = 'stylesheets/style.css';

gulp.task('stream', function () 
{
    return gulp.src(SASS_FILES)
    			.pipe(watch(SASS_FILES,{verbose:true}))
        		.pipe(plumber())
        		.pipe(sass())
        		.pipe(gulp.dest(DIST_FOLDER));
});


gulp.task('join', function() 
{
	return watch(DIST_FILES, function()
	{
		return gulp.src(JOIN_FILE)
				.pipe(sass())
				.pipe(pleeease())
				.pipe(gulp.dest(PROD_FOLDER));
	});
});


gulp.task('browsersync',function()
{
	browserSync.init({proxy: URL,files: CSS});
});


gulp.task('watch', function () {
	gulp.watch('./sass/**/*.scss', ['minisass']);
});


gulp.task('prod', function () {
	gulp.src('stylesheets/style.css')
		.pipe(pleeease())
		.pipe(gulp.dest('stylesheets'));
});


//
// Icons
//

var iconfont = require('gulp-iconfont');
var iconfontCss = require('gulp-iconfont-css');

var icon_font_name = 'icons';
var icon_source = 'images/icons/*.svg';
var icon_sass_file = '../../sass/atoms/icons.scss';
var icon_taget_path = '../fonts/icons/';
var icon_font_dest = 'fonts/icons/';
var icon_template = 'sass/config/_icon-template.scss';

gulp.task('iconfont', function(){
  gulp.src(icon_source)
    .pipe(iconfontCss({
      fontName: icon_font_name,
      path : icon_template,
      targetPath: icon_sass_file,
      fontPath: icon_taget_path,
    }))
    .pipe(iconfont({
        fontName: icon_font_name,
        normalize: true,
      //fontHeight: 1001
     }))
    .pipe(gulp.dest(icon_font_dest));
});