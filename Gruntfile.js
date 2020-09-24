module.exports = function(grunt) {
  const sass = require('node-sass');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-githooks');
  grunt.initConfig({
    githooks: {
      options: {},
      all: {
        options: {
          hashbang: '#!/usr/bin/env nodejs',
          template: 'hooks/template.js'
        },
        'pre-commit': 'default',
        'post-merge': 'default',
        'post-checkout': 'default'
      }
    },
    sass: {
      dist: {
        options: {
          implementation: sass,
          sourceMap: true,
          // outputStyle: "compact",
          includePaths: [
            'node_modules',
          ],
        },
        files: {
          'Resources/Public/Css/styles.css': 'Resources/Private/Scss/styles.scss',
        }
      }
    },
    uglify: {
      dist: {
        options: {
          sourceMap: true,
        },
        files: {
          'Resources/Public/Js/jquery.min.js': ['node_modules/jquery/dist/jquery.js'],
          'Resources/Public/Js/bootstrap.min.js': ['node_modules/bootstrap/dist/js/bootstrap.js'],
          'Resources/Public/Js/main.min.js': [
            'Resources/Private/Js/stuff.js', // TODO: Get original sources for jquery plugins through yarn.
            'Resources/Private/Js/main.js',
          ],
        }
      }
    },
  });
  grunt.registerTask(
    'default',
    [
      'sass:dist',
      'uglify:dist',
    ]
  );
};
