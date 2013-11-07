module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    stylus: {
      compile: {
        options: {
          paths: ['css'],
          compress: true,
          urlfunc: 'url'
        },
        files: {
          'css/start.css': 'css/start.styl'
        }
      }
    },
    csso: {
      compress: {
        options: {
          report: "gzip"
        },
        files: [
          {src: ["css/start.css"], dest: "css/start.css"}
        ]
      }
    },
    autoprefixer: {
      prefixMe: {
        options: {
          browsers: ["last 2 version", "> 1%", "ie 8", "ie 7"]
        },
        files: [
          {src: ["css/start.css"], dest: "css/start.css"}
        ]
      }
    },
    watch: {
      // Перекомпиляция стилей при изменении styl-файлов
      stylus: {
        files: ['css/*.styl', 'css/*/*.styl', 'css/*/*/*.styl'],
        tasks: ["stylus:compile", "autoprefixer:prefixMe", "csso:compress"]
      }
    }
  });

  // Загрузка модулей
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-stylus');
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-csso");

  grunt.registerTask('default', 'watch');
};