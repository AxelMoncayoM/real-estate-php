const { src, dest, watch, series } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const imagemin = require("gulp-imagemin");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const sourcemaps = require("gulp-sourcemaps");
const plumber = require("gulp-plumber");
const postcss = require("gulp-postcss");
const terser = require("gulp-terser-js");

function css(done) {
  //prettier-ignore
  src('src/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write())
        .pipe(dest('build/css'))

  done();
}

function images(done) {
  //prettier-ignore
  src('src/img/**/*.{jpg,png}')
        .pipe(imagemin({ optimizationLevel: 3 }))
        .pipe(dest('build/img'))

  done();
}

function js(done) {
  //prettier-ignore
  src("src/js/**/*.js")
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(dest("build/js"))

  done();
}

function dev(done) {
  watch("src/scss/**/*.scss", css);
  watch("src/js/**/*.js", js);

  done();
}

exports.css = css;
exports.images = images;
exports.js = js;
//exports.dev = series(imagemin, dev);
exports.dev = dev;
exports.default = series(js, dev);
