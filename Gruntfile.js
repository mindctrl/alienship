module.exports = function(grunt) {

	var jsFileList = [
		'assets/js/bootstrap/transition.js',
		'assets/js/bootstrap/alert.js',
		'assets/js/bootstrap/button.js',
		'assets/js/bootstrap/carousel.js',
		'assets/js/bootstrap/collapse.js',
		'assets/js/bootstrap/dropdown.js',
		'assets/js/bootstrap/modal.js',
		'assets/js/bootstrap/tooltip.js',
		'assets/js/bootstrap/popover.js',
		'assets/js/bootstrap/scrollspy.js',
		'assets/js/bootstrap/tab.js',
		'assets/js/bootstrap/affix.js',
		'assets/js/alienship-helper.js',
	];

	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Combine our javascript files into one
		concat: {
			dist: {
				src: [jsFileList],
				dest: 'assets/js/scripts.js',
			}
		},

		// Minify javascript
		uglify: {
			build: {
				src: 'assets/js/scripts.js',
				dest: 'assets/js/scripts.min.js'
			}
		},

		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'style.css': 'assets/sass/style.scss'
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9', 'android 2.3', 'android 4']
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

		makepot: {
			theme: {
				options: {
					type: 'wp-theme',
					domainPath: 'languages'
				}
			}
		},

		watch: {

			scripts: {
				files: ['assets/js/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			},

			css: {
				files: ['assets/sass/*.scss'],
				tasks: ['sass', 'autoprefixer', 'cssmin'],
			},

			livereload: {
				options: {
					livereload: true
				},
				files: [
					'style.css',
					'style.min.css'
				]
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
	grunt.loadNpmTasks('grunt-wp-i18n');


	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
	grunt.registerTask('default', ['concat', 'uglify', 'sass', 'cssmin', 'autoprefixer', 'watch']);

};
