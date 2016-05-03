$(document).ready(function(){

	$.get(baseURL + "student/course/registration/all", function(response){
		var registrations = JSON.parse(response);
		var sl = 1;
		for(i in registrations){

			var id = registrations[i].id;
			var year = registrations[i].year;
			var term = registrations[i].term;
			var session = registrations[i].session;
			var courses = JSON.parse(registrations[i].courses);
			var status = registrations[i].course_registration_status;

			year = getYear(year);
			term = getTerm(term);
			courses = getCourses(courses);
			status = getStatus(status);

			$(".registrations").append('<tr class="active">\
				      <td>'+ (sl++) +'</td>\
				      <td>'+ year +'</td>\
				      <td>'+ term +'</td>\
				      <td>'+ session +'</td>\
				      <td>'+ courses +'</td>\
				      <td>'+ status +'</td>\
				      <td><button class="btn btn-danger cancel" id="'+ id +'">Cancel</button></td>\
				    </tr>');

		}
	});

	$("body").on('click', ".cancel", function(e){
		e.preventDefault();
		var obj = $(this).closest(".active");
		$.post(baseURL + "student/registration/delete", {registration_id:this.id}, function(response){
			if(response == '1'){
				obj.remove();
			}else{
				alert("Sorry, there is a problem. Please try again");
			}
		});
	});

});

function getYear(year){
	if(year == '1') return 'First Year';
	if(year == '2') return 'Second Year';
	if(year == '3') return 'Third Year';
	if(year == '4') return 'Fourth Year';
}

function getTerm(term){
	if(term == '1') return "First Term";
	if(term == '2') return "Second Term";
	if(term == 'backlog') return "Backlog";
	if(term == 'special_backlog') return "Special Backlog";
}

function getCourses(courses){
	var response = "";
	response += courses[0].code;
	for(var i=1; i<courses.length; i++){
		response += ", " + courses[i].code;
	}
	return response;
}

function getStatus(status){
	if(status == 'adviser') return 'Pending to Adviser';
	if(status == 'academic_building') return 'Pending to Academic building';
	if(status == 'registered') return 'Registered';
}