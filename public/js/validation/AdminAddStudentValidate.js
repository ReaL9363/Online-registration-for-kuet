$(document).ready(function(){
	$("#addStudentFrom").validate({
		rules : {
			roll : {
				required : true,
				roll : true
			},
			password : {
				required : true
			},
			department : {
				required : true
			},
			batch : {
				required : true,
				batch : true
			}
		}
	});


	$.validator.addMethod('roll', function(value, element){
		if(value.length != 7) return false;

		var patt = /[^0-9]+/;
		if(patt.test(value)) return false;

		return true;
	}, 'Please enter a valid roll');

	$.validator.addMethod('batch', function(value, element){
		if(value.length != 4) return false;

		var patt = /[^0-9]+/;
		if(patt.test(value)) return false;

		if(value < 2000) return false;

		return true;
	}, 'Please enter valid batch. ie. 2011');
});

angular.module('admin', []).controller('AddStudentFormController', function($scope, $http){
	$scope.usernameError = false;
	$scope.showAlert = function(){
		$http.get(baseURL + 'user/check?username=' + $scope.roll).success(function(response){
			$scope.usernameError = response.found;
		});
	};
});