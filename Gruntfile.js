module.exports = function(grunt) {

	var jsFileList = [
		'assets/javascripts/bootstrap/transition.js',
		'assets/javascripts/bootstrap/alert.js',
		'assets/javascripts/bootstrap/button.js',
		'assets/javascripts/bootstrap/carousel.js',
		'assets/javascripts/bootstrap/collapse.js',
		'assets/javascripts/bootstrap/dropdown.js',
		'assets/javascripts/bootstrap/modal.js',
		'assets/javascripts/bootstrap/tooltip.js',
		'assets/javascripts/bootstrap/popover.js',
		'assets/javascripts/bootstrap/scrollspy.js',
		'assets/javascripts/bootstrap/tab.js',
		'assets/javascripts/bootstrap/affix.js',
		'assets/javascripts/alienship-helper.js',
	];

	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Combine our javascript files into one
		concat: {
			dist: {
				src: [jsFileList],
				dest: 'assets/javascripts/scripts.js',
			}
		},

		// Minify javascript
		uglify: {
			build: {
				src: 'assets/javascripts/scripts.js',
				dest: 'assets/javascripts/scripts.min.js'
			}
		},

		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'style.css': 'assets/stylesheets/style.scss'
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9', 'Android']
			},
			single_file: {
				src: 'style.css',
				dest: 'style.css'
			}
		},

		cssmin: {
			combine: {
				files: {
					'style.min.css': ['style.css']
				}
			}
		},

		shell: {
			grunt: {
				command: 'afplay ~/Music/Grunt.aiff'
			}
		},

		watch: {
			options: {
				livereload: true,
			},

			scripts: {
				files: ['assets/javascripts/*.js'],
				tasks: ['concat', 'uglify', 'shell:grunt'],
				options: {
					spawn: false,
				},
			},

			css: {
				files: ['assets/stylesheets/*.scss'],
				tasks: ['sass', 'cssmin', 'shell:grunt'],
				options: {
					spawn: false,
				}
			},

		}

	});

	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-shell');


	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
	grunt.registerTask('default', ['concat', 'uglify', 'sass', 'cssmin', 'autoprefixer', 'watch', 'shell']);

};
