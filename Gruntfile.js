module.exports = function(grunt){
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),	
		
		/**
		 * Minify and custom JS
		 */
		 uglify: {
            options: {
                banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */',
                sourceMap: true
            },
            dist: {
                files: {
                    'js/kb.min.js': ['js/kb.js'],
                }
            }
        },
        
		/**
		 * Lint JS
		 */
        jshint: {
            all: ['Gruntfile.js', 'js/*.js', '!js/*.min.js'],
            options: {
                globals: {
                    jQuery: true
                }
            }
        },
		
		/**
		 * Sass tasks
		 */
		 sass: {
			dev: {
				options: {
					style: 'expanded'
				},
				files: {
					'css/kb.css' : 'css/sass/kb.scss'
				}	
			},
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'css/kb.min.css' : 'css/sass/kb.scss',
				}	
			}	 
		 },
		 
		 /**
		 * Autoprefixer
		 */
		 postcss: {
			options: {
				map: {
					inline: false	
				},
				processors: [
					require('autoprefixer')({browsers: ['last 2 versions']})
				]
			},
			// prefix all css files in the project root
			dist: {
				src: 'css/*.min.css',
			}	 
		 },
		
		/**
		 * Watch task
		 */
		 watch: {
			css: {
				files: ['./css/sass/*.scss'],
				tasks: ['sass','postcss']	
			},
			js: {
				files: ['js/*.js'],
				tasks: ['uglify', 'jshint']
			} 
		 }
	});
	
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-sass');
	grunt.registerTask('default',['watch']);
};