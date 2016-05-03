var app = angular.module('pendingCourseRegistration', ['studentFilter', 'CourseService']);


app.controller('pendingCourseRegistrationController', function($scope, $http, CountCourses){
	$scope.departments = ['CE', 'EEE', 'ME', 'CSE', 'ECE', 'IPE', 'LE', 'TE', 'BECM', 'URP', 'BME'];

	$scope.registrationRequests = [];
	$scope.courses = [];
	$scope.currentlyViewingRegID = 0;
	$scope.roll = 0;
	$scope.orderColumn = 'full_name';

	$scope.onDepartmentListClick = function(clickedDepartment){
		$http.get(baseURL + 'api/admin/course/registration/request/' + clickedDepartment).success(function(response){
			$scope.registrationRequests = response;
		}).error(function(){
			alert("Sorry, There is an error");
		});
	};

	$scope.order = function(column){
		$scope.orderColumn = column;
	};

	$scope.viewRegistrationDetails = function(roll, reg_id){
		$scope.roll = roll;
		$scope.currentlyViewingRegID = reg_id;
		$http.get(baseURL + 'api/admin/course/registration/details/' + reg_id).success(function(response){
			$scope.courses = response;
			$scope.countCourse = CountCourses.getCountTheoryAndSessionalCourse($scope.courses);
		}).error(function(){
			alert("Error. please try again");
		});
	};

	$scope.acceptCourseRegistration = function(){
		$("#accept").attr('disabled', true);
		$http.post(baseURL + 'api/admin/course/registration/accept/' + $scope.currentlyViewingRegID + '/' + $scope.roll, {}).success(function(response){
			if(response == '1'){
				for(var i in $scope.registrationRequests){
					if($scope.registrationRequests[i].id == $scope.currentlyViewingRegID){
						$scope.registrationRequests.splice(i, 1);
						break;
					}
				}
				$('#details').modal('hide');
				$("#accept").attr('disabled', false);
			}else{
				alert("Error, please try again");
				$("#accept").attr('disabled', false);
			}
		}).error(function(){
			alert("Error, please try again");
			$("#accept").attr('disabled', false);
		});
	};

	$scope.rejectCourseRegistration = function(){
		$("#reject").attr('disabled', true);
		$http.post(baseURL + 'api/admin/course/registration/reject/' + $scope.currentlyViewingRegID + '/' + $scope.roll, {}).success(function(response){
			if(response == '1'){
				for(var i in $scope.registrationRequests){
					if($scope.registrationRequests[i].id == $scope.currentlyViewingRegID){
						$scope.registrationRequests.splice(i, 1);
						break;
					}
				}
				$('#details').modal('hide');
				$("#reject").attr('disabled', false);
			}else{
				alert("Error, please try again");
				$("#reject").attr('disabled', false);
			}
		}).error(function(){
			alert("Error, please try again");
			$("#reject").attr('disabled', false);
		});
	}

});