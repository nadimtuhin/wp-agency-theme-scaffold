const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const terser = require('gulp-terser');
const rename = require('gulp-rename');

const paths = {
  styles: {
    src: 'src/scss/**/*.scss',
    dest: 'assets/css/'
  },
  scripts: {
    src: 'src/js/**/*.js',
    dest: 'assets/js/'
  }
};

function styles() {
  return gulp.src('src/scss/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.styles.dest));
}

function scripts() {
  return gulp.src(['src/js/modules/*.js', 'src/js/main.js'], { allowEmpty: true })
    .pipe(sourcemaps.init())
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.scripts.dest));
}

function watch() {
  gulp.watch(paths.styles.src, styles);
  gulp.watch(paths.scripts.src, scripts);
}

const build = gulp.parallel(styles, scripts);

exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.build = build;
exports.default = gulp.series(build, watch);
