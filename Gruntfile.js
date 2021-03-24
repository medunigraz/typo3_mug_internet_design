module.exports = function(grunt) {
  const sass = require('node-sass');
  grunt.loadNpmTasks('grunt-subgrunt');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-githooks');
  grunt.initConfig({
    githooks: {
      options: {},
      all: {
        'pre-commit': 'default',
        'post-merge': 'default',
        'post-checkout': 'default'
      }
    },
    subgrunt: {
      dist: {
        'node_modules/jquery-ui': ['concat', 'requirejs']
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
          outputStyle: 'compressed',
        },
        files: {
          'Resources/Public/Css/styles.min.css': 'Resources/Private/Scss/styles.scss',
          'Resources/Public/Css/print.min.css': 'Resources/Private/Scss/print.scss',
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
          'Resources/Public/Js/jquery-ui.min.js': ['node_modules/jquery-ui/dist/jquery-ui.js'],
          'Resources/Public/Js/bootstrap.min.js': ['node_modules/bootstrap/dist/js/bootstrap.js'],
          'Resources/Public/Js/main.min.js': [
            'Resources/Private/Js/stuff.js', // TODO: Get original sources for jquery plugins through yarn.
            'Resources/Private/Js/main.js',
          ],
        }
      }
    },
    copy: {
      dist: {
        files: [
          // includes files within path
          {
            expand: true,
            flatten: true,
            src: [
              'node_modules/jquery-ui/dist/jquery-ui.css',
            ],
            dest: 'Resources/Public/Css/',
            filter: 'isFile',
          },
          {
            expand: true,
            flatten: true,
            src: [
              'node_modules/fontsource-ubuntu/files/*.woff',
              'node_modules/fontsource-ubuntu/files/*.woff2',
            ],
            dest: 'Resources/Public/Fonts/',
            filter: 'isFile',
          },
        ],
      },
    },
  });
  grunt.registerTask(
    'default',
    [
      'subgrunt:dist',
      'sass:dist',
      'uglify:dist',
      'copy:dist',
    ]
  );
  grunt.registerTask(
    'prepare',
    [
      'githooks:all',
    ]
  );
};
