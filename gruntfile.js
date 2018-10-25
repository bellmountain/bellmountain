module.exports = function(grunt) {

	// Project configuration.
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		imagemin: {
			dev: {
				options: {
					optimizationLevel: 3,
				},
				files: [{
					expand: true,
					cwd: 'dev/images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'img/'
				}]
			}
		},

		less: {
			all: {
				options: {
					plugins: [
						new (require('less-plugin-autoprefix'))({browsers: ['> 1%', 'last 50 versions', 'ie 6', 'ie 7', 'ie 8', 'ie 9', '> 5%', '> 5% in US', 'iOS 7', 'Firefox >= 20']})
					],
				},
				files: [{
					expand: true,
					cwd: 'dev/css/',
					src: ['*.less'],
					dest: 'assets/css/',
					ext: '.css'
				}]
			}
		},

		watch: {
			css: {
				files: ['dev/css/**/*.less'],
				tasks: ['less'],
				options: {
					spawn: false,
				},
			}
		},

		
	});

	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('image', ['imagemin']);
	grunt.registerTask('default', ['watch']);

};