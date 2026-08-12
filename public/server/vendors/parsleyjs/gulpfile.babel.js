import gulp  from 'gulp';
import loadPlugins from 'gulp-load-plugins';
import del  from 'del';
import glob  from 'glob';
import path  from 'path';
import isparta  from 'isparta';
import babelify  from 'babelify';
import watchify  from 'watchify';
import buffer  from 'vinyl-buffer';
import esperanto  from 'esperanto';
import browserify  from 'browserify';
import runSequence  from 'run-sequence';
import source  from 'vinyl-source-stream';
import fs  from 'fs';
import moment  from 'moment';
import docco  from 'docco';
import {spawn} from 'child_process';
import manifest  from './package.json';
const $ = loadPlugins();
// Gather the library data from `package.json`
const mainFile = manifest.main;
const destinationFolder = path.dirname(mainFile);
const exportFileName = path.basename(mainFile, path.extname(mainFile));
// Remove a directory
function _clean(dir, done) {
}
function cleanDist(done) {
  _clean(destinationFolder, done)
}
  _clean('tmp', done)
}
// Send a notification when JSCS fails,
function _jscsNotify(file) {
  if (!file.jscs) { return; }
  return file.jscs.success ? false : 'JSCS failed';
// Lint a set of files
function lint(files) {
  return gulp.src(files)
    .pipe($.plumber())
    .pipe($.eslint())
    .pipe($.eslint.format())
    .pipe($.jscs())
    .pipe($.notify(_jscsNotify));
}
function lintSrc() {
  return lint('src/**/*.js');
}
function lintTest() {
  return lint('test/**/*.js');
}
function build(done) {
    base: 'src',
    entry: config.entryFileName,
  }).then(bundle => {
      // Don't worry about the fact that the source map is inlined at this step.
      // `gulp-sourcemaps`, which comes next, will externalize them.
      sourceMap: 'inline',
    });
    const head = fs.readFileSync('src/header.js', 'utf8');
    $.file(exportFileName + '.js', res.code, { src: true })
      .pipe($.plumber())
      .pipe($.replace('@@version', manifest.version))
      .pipe($.sourcemaps.init({ loadMaps: true }))
      .pipe($.babel())
      .pipe($.header(head, {pkg: manifest, now: moment()}))
      .pipe($.replace('global.$', 'global.jQuery')) // Babel bases itself on the variable name we use. Use jQuery for noconflict users.
      .pipe($.sourcemaps.write('./'))
      .pipe(gulp.dest(destinationFolder))
      .pipe($.filter(['*', '!**/*.js.map']))
      .pipe($.sourcemaps.init({ loadMaps: true }))
      .pipe($.uglify({preserveComments: 'license'}))
      .pipe($.sourcemaps.write('./'))
      .pipe(gulp.dest(destinationFolder))
      .on('end', done);
  })
  .catch(done);
}
function buildDoc(done) {
  var dest = 'doc/annotated-source/';
  var sources = glob.sync('src/parsley/*.js');
  del.sync([dest + '*']);
  docco.document({
    layout: 'parallel',
    output: dest,
    args: sources
  }, function() {
      gulp.src(dest + '*.html', { base: "./" })
      .pipe($.replace('<div id="jump_page">', '<div id="jump_page"><a class="source" href="../index.html"><<< back to documentation</a>'))
      .pipe(gulp.dest('.'))
      .on('end', done);
  });
}
function copyI18n(done) {
  gulp.src(['src/i18n/*.js'])
    .pipe($.replace("import Parsley from '../parsley';", "// Load this after Parsley"))  // Quick hack
    .pipe($.replace("import Parsley from '../parsley/main';", ""))  // en uses special import
    .pipe(gulp.dest('dist/i18n/'))
    .on('end', done);
}
function writeVersion() {
  return gulp.src(['index.html', 'doc/download.html', 'README.md'], { base: "./" })
    .pipe($.replace(/class="parsley-version">[^<]*</, `class="parsley-version">v${manifest.version}<`))
    .pipe($.replace(/releases\/tag\/[^"]*/, `releases/tag/${manifest.version}`))
    .pipe($.replace(/## Version\n\n\S+\n\n/, `## Version\n\n${manifest.version}\n\n`))
}
function _runBrowserifyBundle(bundler, dest) {
  return bundler.bundle()
    .on('error', err => {
      console.log(err.message);
      this.emit('end');
    })
    .pipe(source(dest || './tmp/__spec-build.js'))
    .pipe(buffer())
    .pipe(gulp.dest(''))
    .pipe($.livereload());
}
function browserifyBundler() {
  // Our browserify bundle is made up of our unit tests, which
  // We also include the browserify setup file.
  const testFiles = glob.sync('./test/unit/**/*.js');
  const allFiles = ['./test/setup/browserify.js'].concat(testFiles);
  // Create our bundler, passing in the arguments required for watchify
  watchify.args.debug = true;
  const bundler = browserify(allFiles, watchify.args);
  // Set up Babelify so that ES6 works in the tests
  bundler.transform(babelify.configure({
    sourceMapRelative: __dirname + '/src'
  }));
  return bundler;
}
// in the browser
function _browserifyBundle() {
  let bundler = browserifyBundler();
  // Watch the bundler, and re-bundle it whenever files change
  bundler = watchify(bundler);
  bundler.on('update', () => _runBrowserifyBundle(bundler));
}
function buildDocTest() {
  return _runBrowserifyBundle(browserifyBundler(), './doc/assets/spec-build.js');
function _mocha() {
  return gulp.src(['test/setup/node.js', 'test/unit/**/*.js'], {read: false})
    .pipe($.mocha({reporter: 'dot', globals: config.mochaGlobals}));
}
  require('babel-core/register');
}
  _registerBabel();
  return _mocha();
}
function coverage(done) {
  _registerBabel();
  gulp.src([exportFileName + '.js'])
    .pipe($.istanbul({ instrumenter: isparta.Instrumenter }))
    .on('finish', () => {
      return test()
        .on('end', done);
    });
}
// watchify is used instead, so these aren't included.
const jsWatchFiles = ['src/**/*', 'test/**/*'];
// These are files other than JS files which are to be watched. They are always watched.
const otherWatchFiles = ['package.json', '**/.eslintrc', '.jscsrc'];
function watch() {
  const watchFiles = jsWatchFiles.concat(otherWatchFiles);
  gulp.watch(watchFiles, ['test']);
function testBrowser() {
  // Ensure that linting occurs before browserify runs. This prevents
  // the build from breaking due to poorly formatted code.
  runSequence(['lint-src', 'lint-test'], () => {
    $.livereload.listen({port: 35729, host: 'localhost', start: true});
    gulp.watch(otherWatchFiles, ['lint-src', 'lint-test']);
  });
}
function gitClean() {
  $.git.status({args : '--porcelain'}, (err, stdout) => {
    if (err) throw err;
    if (/^ ?M/.test(stdout)) throw 'You have uncommitted changes!'
  });
}
function npmPublish(done) {
}
function gitPush() {
  $.git.push('origin', 'master', {args: '--follow-tags'}, err => { if (err) throw err });
}
function gitPushPages() {
}
function gitTag() {
  $.git.tag(manifest.version, {quiet: false}, err => { if (err) throw err });
}
gulp.task('release-git-clean', gitClean);
gulp.task('release-git-push', gitPush);
gulp.task('release-git-push-pages', gitPushPages);
gulp.task('release-git-tag', gitTag);
gulp.task('release', () => {
  runSequence('release-git-clean', 'release-git-tag', 'release-git-push', 'release-git-push-pages', 'release-npm-publish');
});
// Remove the built files
gulp.task('clean', cleanDist);
// Remove our temporary files
// Lint our source code
gulp.task('lint-src', lintSrc);
// Lint our test code
gulp.task('lint-test', lintTest);
// Build two versions of the library
gulp.task('build-src', ['lint-src', 'clean', 'build-i18n'], build);
gulp.task('build-i18n', ['clean'], copyI18n);
// Build the annotated documentation
gulp.task('build-doc', buildDoc);
gulp.task('build-doc-test', buildDocTest);
gulp.task('write-version', writeVersion);
gulp.task('build', ['build-src', 'build-i18n', 'build-doc', 'build-doc-test', 'write-version']);
gulp.task('test', ['lint-src', 'lint-test'], test);
// Set up coverage and run tests
gulp.task('coverage', ['lint-src', 'lint-test'], coverage);
gulp.task('test-browser', testBrowser);
// Run the headless unit tests as you make changes.
gulp.task('watch', watch);
gulp.task('default', ['test']);
