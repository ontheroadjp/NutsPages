var gulp = require('gulp');
var del = require('del');
var runSequence = require('run-sequence');
var sass = require('gulp-ruby-sass');
var pleeease = require('gulp-pleeease');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync');
var shell = require('gulp-shell');

// Directory Paths

var paths = {
	'jquery': 'bower_components/jquery/',
	'bootstrap': 'bower_components/bootstrap-sass/assets/',
	'fontawesome': 'bower_components/font-awesome/',
	'adminlte': 'bower_components/AdminLTE/',
	'src': 'assets/',
	'lara_public': '../../../public/',
	'lara_resources': '../../../resources/',
}

// -------------------------
// vendor:publish

//gulp.task('publish',shell.task([ 
//	'php artisan vendor:publish --force' 
//]));
//
//gulp.task('publish-bs-reload', function(callback) {
//	return runSequence('publish',['bs-reload']);
//});

// -------------------------
// build

gulp.task('build', function(callback) {
	return runSequence('clean',[ 'bowerassets','sass','js','img' ]);
});

gulp.task('clean', function(callback) {
	return del([paths.lara_public], callback);
});

// -------------------------
// Bower Assets

gulp.task('bowerassets', function() {

	// Bootstrap
	gulp.src(paths.bootstrap + 'fonts/bootstrap/**')
		.pipe(gulp.dest(paths.lara_public + 'fonts/bootstrap'));
		//.pipe(reload({stream:true}));

	// Font-Awesome
	gulp.src(paths.fontawesome + 'fonts/**')
		.pipe(gulp.dest(paths.lara_public + 'fonts'));
		//.pipe(reload({stream:true}));

	// AdminLTE(css)
	gulp.src(paths.adminlte + 'dist/css/**')
		.pipe(gulp.dest(paths.lara_public + 'css'));
		//.pipe(reload({stream:true}));

	// AdminLTE(css/skins)
	gulp.src(paths.adminlte + 'dist/css/skins/**')
		.pipe(gulp.dest(paths.lara_public + 'css/skins'));
		//.pipe(reload({stream:true}));

	// AdminLTE(img)
	gulp.src(paths.adminlte + 'dist/img/**.{png,jpg,gif,svg}')
    .pipe(imagemin({optimizationLevel: 7}))
		.pipe(gulp.dest(paths.lara_public + 'img/adminlte'));
		//.pipe(reload({stream:true}));
});

// -------------------------
// Sass
gulp.task('sass', function () {
	sass(paths.src + 'sass',{
			style: 'expanded',
			sourcemap: true
		}
	)
	.pipe(pleeease({
		autoprefixer: {"browsers": ["last 4 versions", "Android 2.3"]},
		minifier: false
	}))
	.pipe(sourcemaps.write('./'))
	.pipe(gulp.dest(paths.lara_public + 'css'));
	//.pipe(reload({stream:true}));
});

// -------------------------
// Js-concat-uglify

gulp.task('js', function() {
	gulp.src([
			paths.jquery + 'dist/jquery.js',
			paths.bootstrap + 'javascripts/bootstrap.js',
			paths.adminlte + 'dist/js/app.js',
			paths.src + 'js/**/*.js'
		])
	.pipe(concat('app.js'))
	.pipe(uglify({preserveComments: 'some'})) // Keep some comments
	.pipe(gulp.dest(paths.lara_public + 'js'));
	//.pipe(reload({stream:true}));
});

// -------------------------
// Imagemin

gulp.task('img', function() {
    gulp.src([paths.src + 'img/**/*.{png,jpg,gif,svg}'])
        .pipe(imagemin({optimizationLevel: 7}))
        .pipe(gulp.dest(paths.lara_public + 'img'));
});


// -------------------------
// Task for `gulp` command

gulp.task('default', function() {
//gulp.task('default',['browser-sync'], function() {
	//gulp.watch(paths.src + "**/*.html", ['assets','publish-bs-reload']);
	//gulp.watch(paths.src + "**/*.php", ['assets','publish-bs-reload']);
	gulp.watch(paths.src + 'sass/**/*.scss',['sass','bs-reload']);
	gulp.watch(paths.src + 'js/**/*.js',['js','bs-reload']);
	gulp.watch(paths.src + 'img/**/*.{png,jpg,gif,svg}',['imagemin','bs-reload']);
});



