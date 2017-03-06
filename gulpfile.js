var gulp = require('gulp');
var connect = require('gulp-connect');

// define tasks here
gulp.task('default', function(){
  // run tasks here
  // set up watch handlers here
});


gulp.task('connect', function() {
    connect.server({
        root: 'src',
        livereload: true,
        port: 9000
    });
});