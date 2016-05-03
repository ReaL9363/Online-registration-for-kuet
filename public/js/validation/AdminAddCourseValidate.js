$(document).ready(function(){
	$("#AdminAddCourse").validate({
		rules:{
			code:{
				required:true,
				code:true
			},
			name:{
				required:true
			},
			credit:{
				required:true,
				credit:true
			}
		}
	});

	$.validator.addMethod('code', function(value, element){

		var patt = /^[a-zA-Z]+ [0-9]{4}$/;
		if(!patt.test(value)) return false;

		return true;

	}, 'Please enter valid code. ie. CSE 1101');

	$.validator.addMethod('credit', function(value, element){

		var patt = /^[0-9]{1,2}[.][0-9]{1,2}$/;
		if(!patt.test(value)) return false;

		return true;

	}, 'Please enter valid credit. ie. 3.00');
});

angular.module('admin', []).controller('AddCourseController', function($scope, $http){

	$scope.codeError = false;

	$scope.checkCode = function(){
		$http.get(baseURL + 'course/check?code=' + $scope.code).success(function(res){
			$scope.codeError = res.found;
		});
	};

	
});