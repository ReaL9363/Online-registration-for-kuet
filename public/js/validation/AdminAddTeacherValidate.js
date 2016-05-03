$(document).ready(function(){
	$("#newTeacherAddForm").validate({
		rules : {
			username : {
				required : true
			},
			password : {
				required : true
			}
		}
	});
});

angular.module('admin', []).controller('AddTeacherController', function($scope, $http){

	$scope.checkUsername = function(){
		$http.get(baseURL + 'user/check?username=' + $scope.username).success(function(res){
			$scope.usernameError = res.found;
		});
	};
});