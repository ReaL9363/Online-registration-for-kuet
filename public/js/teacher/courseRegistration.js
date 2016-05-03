$(document).ready(function(){

	$.get(baseURL + "api/teacher/get/course/registration", function(response){
		var registrations = JSON.parse(response);
		var sl = 1;
		for(var i in registrations){
			var id = registrations[i].registration_id;
			var roll = registrations[i].roll;
			var term = registrations[i].term;
			var year = registrations[i].year;

			$(".course_registration_list").append('<tr class="active">\
				      <td>'+ (sl++) +'</td>\
				      <td>'+ roll +'</td>\
				      <td>'+ getYear(year) +'</td>\
				      <td>'+ getTerm(term) +'</td>\
				      <td><a href="registration/details/'+ id +'" class="btn btn-primary">Details</a></td>\
				    </tr>');

		}
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