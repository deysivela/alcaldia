module.exports = (grunt) ->
  grunt.loadNpmTasks('grunt-contrib-sass')
  grunt.loadNpmTasks('grunt-contrib-watch')
  grunt.loadNpmTasks('grunt-release')
  grunt.initConfig
    coffee:
      all:
        dest: 'dist/starrr.js'
        options:
          bare: true
    sass:
      all:
        files:
        options:
          sourcemap: 'none'
    watch:
      all:
        files: ['src/starrr.coffee', 'src/starrr.scss']
        tasks: 'default'
