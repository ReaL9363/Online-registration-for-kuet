$(document).ready(function(){

	var total_credit = 0.0;

	$(".all_courses").html("");
	$(".selected_course_table").hide();
	$("#selected_course_title").hide();
	$("#select_department").on('change', function(){
		var year = $("#select_year").val();
		var term = $("#select_term").val();
		getCourses(year, term);
	});

	$("#select_year").on('change', function(){
		var year = $("#select_year").val();
		var term = $("#select_term").val();
		getCourses(year, term);
	});
	$("#select_term").on('change', function(){
		var year = $("#select_year").val();
		var term = $("#select_term").val();
		getCourses(year, term);
	});


	$("body").on('click', '.all_courses input', function(e){
		$(".selected_course_table").show();
		$("#selected_course_title").show();

		var label = $(this).parent();
		var course = {
			id : $(this).attr("data-course-id"),
			name : $(".course_name", label).html(),
			code : $(".course_code", label).html(),
			credit : $(".course_credit", label).html()
		};

		$(".selected_course_table tbody").append('<tr data-course-id="'+ course.id +'">\
							      <td class="course_name">'+ course.name +'</td>\
							      <td class="course_code">'+ course.code +'</td>\
							      <td class="course_credit">'+ course.credit +'</td>\
							    </tr>');
		total_credit += parseFloat(course.credit);
		$("#total_credit").html(total_credit);

	});

	$("#submitButton").click(function(){

		var courseId = [];
		$(".selected_course_table tbody tr").each(function(index){
			courseId.push($(this).attr('data-course-id'));
		});


		var postData = {
			batch : $("#batch").val(),
			department : $("#select_department").val(),
			year : $("#select_year").val(),
			term : $("#select_term").val(),
			courses : JSON.stringify(courseId)
		};

		$.post(baseURL + 'course/offer', postData, function(response){
			if(response == '1'){
				alert("Course has been offered successfuly");
			}else{
				alert("Sorry, there is a problem. please try again");
			}
		});



	});



});

function getCourses(year, term){
	$(".all_courses").html('');
	$.get(baseURL + "api/get/course/"+ year +"/" + term, function(response){
		for(var i in response){
			$(".all_courses").append('  <label>'+
				            				'<input type="checkbox" data-course-id="'+ response[i].id +'"> <span class="course_code">'+ response[i].code +'</span> - <span style="color:#8e44ad" class="course_name">'+ response[i].name +'</span> - <span class="course_credit">'+ response[i].credit +'</span>'+
				          				'</label><br>');
		}
	});
}