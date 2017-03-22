'use strict'

var gulp = require('gulp');
var pump = require('pump');
var git = require('gulp-git');
var runSequence = require('run-sequence');
var minimist = require('minimist');
var options = minimist(process.argv.slice(2));
var exec = require('child_process').exec;
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var cssmin = require('gulp-cssmin');
var uglify = require('gulp-uglify');
var clean = require('gulp-clean');

var config = require('./gulpconfig')();
var commit_name = options.commit ? options.commit : 'commit-without-name';
var env = options.env ? options.env : 'staging';

gulp.task('sass', function () {
  return gulp.src(config.src + '/style.scss')
    .pipe(sass().on('error', sass.logError))
    //.pipe(cssmin())
    .pipe(gulp.dest(config.dist_wp + '/'));
});

gulp.task('copy', function () {
  return gulp.src(config.theme_files, { base: config.src })
    .pipe(gulp.dest(config.dist_wp + '/'));
});

gulp.task('compile-js', function(cb) {
  pump([
      gulp.src(config.src + '/js/*.js'),
      concat('scripts.js'),
      uglify(),
      gulp.dest(config.dist_wp + '/js/')
    ],
    cb
  );
});

gulp.task('publish', function(cb) {
  return gulp.src('.')
    .pipe(git.add({args: '--all'}))
    .pipe(git.commit(commit_name, {
      disableAppendPaths: true
    }))
    .on('end', function() {
      exec('git push origin master');
    });
});

gulp.task('push-repo', function() {
  exec('git -C ' + config.dist + '/ add . && git -C ' + config.dist + '/ commit -m "' + commit_name + '" && git -C ' + config.dist + '/ push origin master', function(error, stdout, stderr) {
    return gulp.src(config.dist, { read: false })
      .pipe(clean());
  });
});

gulp.task('hub-repo', function() {
  var remotes = (env == 'staging') ? config.staging_env : config.production_env;
  for (var i = 0 ; i < remotes.length ; i++) {
    git.clone(remotes[i].url, { args: './' + config.dist }, function (err) {
      if (err) {
        throw err;
      }
      runSequence('sass','copy','compile-js','push-repo');
    });
  }
});

gulp.task('build', function() {
  runSequence('sass','copy','compile-js');
});

gulp.task('default', function() {
  runSequence('hub-repo');
});
