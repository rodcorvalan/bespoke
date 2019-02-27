const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const pleeease = require('gulp-pleeease');


const armix_browsersync = () => {
	browserSync.init({proxy: 'localhost/colegio',files: 'stylesheets/style.css'});
}

const armix_sass = () => {
	return gulp.src('./sass/style.scss')
			   .pipe(sourcemaps.init())
			   .pipe(sass().on('error', sass.logError))
			   .pipe(sourcemaps.write('./'))
			   .pipe(gulp.dest('./stylesheets/'));
}

const armix_watch = () => {
	return gulp.watch('sass/**/*.scss', ['sass']);
}

const armix_prod = () => {
	return gulp.src('sass/style.scss')
			   .pipe(sass().on('error', sass.logError))
			   .pipe(pleeease())
			   .pipe(gulp.dest('./stylesheets/'));
	
}

exports.browsersync = armix_browsersync;
exports.sass = armix_sass;
exports.watch = armix_watch;
exports.prod = armix_prod;