var app = angular.module('app', []);
var filters = angular.module('studentFilter', []);

filters.filter('year', function(){
	return function(input){
		if(input == '1') return 'First Year';
		if(input == '2') return 'Second Year';
		if(input == '3') return 'Third Year';
		if(input == '4') return 'Fourth Year';
		return input;
	};
});

filters.filter('term', function(){
	return function(input){
		if(input == '1') return 'First Term';
		if(input == '2') return 'Second Term';
		if(input == 'backlog') return 'Backlog';
		if(input == 'special_backlog') return 'Special Backlog';
		return input;
	};
});

var CourseService = angular.module('CourseService', []);
CourseService.service('CountCourses', function(){
	this.getCountTheoryAndSessionalCourse = function(courses){
		var total_theory = 0;
		var total_sessional = 0;
		var total_credit = 0;
		for(var i in courses){
			var len = courses[i].code.length;
			var code = courses[i].code[len-2] + courses[i].code[len-1];
			if(parseInt(code) % 2 == 0) total_sessional++;
			else total_theory++;

			total_credit += parseFloat(courses[i].credit);
		}

		return {total_theory:total_theory, total_sessional:total_sessional,total_credit:total_credit};
	};
});
