var pkg 		= require('./package.json'),
browserSync		= require('browser-sync').create(),
reload      	= browserSync.reload,
gulp 			= require('gulp'),
// Add prefixes to the code automatically for cross browser compatibility
autoprefix		= require('gulp-autoprefixer'),
// Plumber prevents pipe breaking cause be errors from gulp plugins
plumber			= require('gulp-plumber'),
// Compile sass code into css
sass			= require('gulp-sass'),
// Send notifications to the operations system notifications
notify      	= require('gulp-notify'),
// Sourcemap
sourcemaps		= require('gulp-sourcemaps'),
// Rename the file
rename      	 = require('gulp-rename'),
// Add header to the files
header      	 = require('gulp-header'),
// Minify css
cssnano     	 = require('gulp-cssnano'),
// Format the date
dateFormat  	 = require('dateformat'),
// Minify js files
uglify      	 = require('gulp-uglify'),
// Javascript hints
jshint      	 = require('gulp-jshint'),
// Require modules
browserify     = require('browserify')
// Add hash to file names for cache boost
rev 			= require('gulp-rev'),
// Wrapper around node streams to make gulp plugin write easier
through        = require('through2'),
// Concatenate js files
concat      	 = require('gulp-concat'),
babelify       = require('babelify'),
// Stream file contents
buffer         = require('vinyl-buffer'),
// Filters files in the vinyl stream
filter      	 = require('gulp-filter'),
source         = require('vinyl-source-stream'),
// Modify file name
modify         = require('modify-filename');


// Set the banner
var now = dateFormat(new Date(), "yyyy-mm-dd HH:MM:ss Z"),
banner  = '/*!\n'+
		  ' * Build date: '+ now +'\n'+
		  ' */\n';



// Hold the name of the last task to run, in case of error
var taskName;

var handleError = function(err) {
	var file = err.file;
	var line = err.line;

	if(typeof err.file === 'undefined') {
		file = err.fileName;
	}

	if(typeof err.line === 'undefined') {
		line = err.lineNumber;
	}

	var splitErrMessage  = err.message.split("\n"),
		errMessageLength = splitErrMessage.length,
		message          =
			"Error running '" + taskName + "' task." +
			"\n\t   File: " + file +
			"\n\t   Line: " + line +
			"\n\t   Message: " + splitErrMessage[0]
	;

	// Some errors have a second part
	if(typeof splitErrMessage[1] !== 'undefined') {
		message += "\n\t   " + splitErrMessage[1];
	}

	// Some have even more (missing mixin for example where it'll privide a backtrace)
	if(errMessageLength > 2) {
		splitErrMessage.forEach(function(el, i) {
			if(i > 1) {
				message += "\n\t\t" + splitErrMessage[i].trim();
			}
		});
	}

	return notify().write(message);
};

// Plugin scripts task: Concat JS files for plugins
gulp.task('plugin-scripts', function() {
	gulp.src('app/theme/js/plugins/**/*.js')
		//.pipe(filter(['*.js']))
		.pipe(concat({path: 'plugins.min.js', cwd: ''}))
		.pipe(uglify())
		.pipe(header(banner, { pkg: pkg }))
		.pipe(gulp.dest('app/theme/js/'))
		.pipe(browserSync.stream({ match: '**/*.js' }))
		.pipe(rev())
		.pipe(through.obj(function(file, enc, cb) {
			file.path = modify(file.revOrigPath, function(name, ext) {
				return file.revHash;
			});

			cb(null, file);
		}))
		.pipe(rev.manifest('plugin-scripts.json'))
		.pipe(gulp.dest('rev'));
});

gulp.task('scripts', function() {
	// this.seq is an array containing the tasks that have run, we want the last one
	taskName = this.seq.pop();

	const b = browserify({
		entries: 'app/theme/js/src/app.js',
		transform: babelify,
		debug: true
	});

	return b.bundle()
		.on('error', handleError)
		.pipe(source('app.min.js'))
		.pipe(plumber({ errorHandler: handleError }))
		.pipe(buffer())
		.pipe(sourcemaps.init({ loadMaps: true }))
		.pipe(uglify())
		.pipe(header(banner, { pkg: pkg }))
		.pipe(sourcemaps.write('maps', { includeContent: false }))
		.pipe(gulp.dest('app/theme/js/'))
		.pipe(browserSync.stream({ match: '**/*.js' }))
		.pipe(rev())
		.pipe(through.obj(function(file, enc, cb) {
			file.path = modify(file.revOrigPath, function(name, ext) {
				return file.revHash;
			});

			cb(null, file);
		}))
		.pipe(rev.manifest('scripts.json'))
		.pipe(gulp.dest('rev'));
});

// JS hint task: Runs JSHint using the options in the .jshintrc file
gulp.task('jshint', function() {
	gulp.src('app/theme/js/src/**/*.js')
		.pipe(jshint('.jshintrc'))
		.pipe(jshint.reporter('jshint-stylish'))
		.pipe(notify(function (file) {
			if (file.jshint.success) {
				return 'JSHint: ' + file.relative + ' (complete).';
			} else {
				return 'JSHint: ' + file.relative + ' (' + file.jshint.results.length + ' errors).';
			}
	}));
});


// Styles task: Compile Sass, add prefixes and minify
gulp.task('styles', function() {
	// this.seq is an array containing the tasks that have run, we want the last one
	taskName = this.seq.pop();

	gulp.src("app/theme/css/**/*.scss")
		.pipe(plumber({errorHandler: handleError}))
		.pipe(sourcemaps.init())
		.pipe(sass({ outputStyle: 'expanded', loadPath: 'app/theme/css' }))
		.pipe(autoprefix())
		.pipe(gulp.dest("app/theme/css/"))
		.pipe(rename({ suffix: ".min" }))
		.pipe(cssnano())
		.pipe(header(banner, {pkg: pkg } ))
		.pipe(sourcemaps.write('.', { includeContent: false, sourceRoot: '.' }))
		.pipe(gulp.dest('app/theme/css/'))
		.pipe(browserSync.stream([{ match: '**/*.css' }]))
		.pipe(rev())
		.pipe(through.obj(function(file, enc, cb) {
			file.path = modify(file.revOrigPath, function(name, ext) {
				return file.revHash;
			});

			cb(null, file);
		}))
		.pipe(rev.manifest('styles.json'))
		.pipe(gulp.dest('rev'));
});

// Configure and start BrowserSync
gulp.task('browser-sync', function() {
	browserSync.init({
		proxy: "http://vue.dev",
		notify: false,
		open: false
	});
});


// Standard watch task
gulp.task('watch', function() {
	gulp.watch('app/theme/js/plugins/**/*.js', ['plugin-scripts', 'styles']);
	gulp.watch('app/theme/js/src/**/*.js', ['jshint', 'scripts']);
	gulp.watch('app/theme/css/**/*.scss', ['styles']);
	gulp.watch('./*.php', reload);
});

// Start BrowserSync and watch for changes
gulp.task('watch-and-sync', ['browser-sync', 'watch']);


// Default task: runs tasks immediately and continues watching for changes
//gulp.task('default', ['jshint', 'scripts', 'plugin-scripts', 'plugin-styles', 'styles', 'watch-and-sync']);