module.exports = function(grunt) {

	grunt.loadNpmTasks('grunt-contrib-sass');

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				files: [{
					expand: true,
					cwd: 'styles',
					src: ['sass/styles.scss'],
					dest: './',
					ext: '.css'
				}]
			}
		}


	});
	
	grunt.registerTask('default', ['sass'] );
	
};