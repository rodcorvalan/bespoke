'use strict';

// Import && Config

var gulp 		= require('gulp');
var sass 		= require('gulp-sass');
var sourcemaps 	= require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var pleeease    = require('gulp-pleeease');
 
sass.compiler = require('node-sass');

// Tasks

gulp.task('browsersync',function() {
	browserSync.init({proxy: 'localhost/arrocal',files: 'stylesheets/style.css'});
});

gulp.task('sass', function () {
	return gulp.src('./sass/style.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'expanded',
			includePaths: ['./node_modules/susy/sass']
		}).on('error', sass.logError))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('./stylesheets/'));
});
 
gulp.task('watch', ['sass'], function () {
	gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('prod', function () {
	return gulp.src('./sass/style.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(pleeease())
		.pipe(gulp.dest('./stylesheets/'));
});