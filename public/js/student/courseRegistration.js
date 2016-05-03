var courseList;
$(document).ready(function(){

	/*
	*	Handle click event when user select year and term to show available courses for registration
	*/
	
	$("#showCourses").click(function(){

		$(".available_courses").html('');
		var year = $("#year").val();
		var term = $("#term").val();
		$.get(baseURL + "/get/course?year="+ year +"&term=" + term, function(response){
			courseList = JSON.parse(response);
			for(var i in courseList){
				$(".available_courses").append('<div class="course">\
													<div>\
											        <b><i style="color:green">'+ courseList[i].name +'</i></b>\
											        </div>\
													Code: <b>'+ courseList[i].code +'</b><br>\
													Credit: <b><span class="credit">'+ courseList[i].credit +'</span></b>\
													<input type="hidden" value="'+ i +'" class="index" />\
												</div>');
			}
		});
	});


	/*
	*	insert course into selected courses list when user click on a course in the left panel
	*/
	var sl = 1;
	var totalCredit = 0.0;
	var courseChoosen = new Array();
	$('body').on('click', '.course', function() {
	    var index = $(".index", this).val();
	    if(!checkMaxCourseChoosen(courseChoosen, courseList[index].code)){
	    	alert("You can take maximum 5 theory and 5 sessional courses");
	    	return;
	    }
	    if(isAlreadyChoosen(courseChoosen, courseList[index].code)){
	    	alert("Alredy taken");
	    	return;
	    }
	    if(checkMaxCreditForBacklog(courseList[index].credit) == false && ($("#registration_term").val() == 'backlog' || $("#registration_term").val() == 'special_backlog')){
	    	alert("Maximum 12 credits are allowed for backlog registration");
	    	return;
	    }
	    totalCredit += parseFloat(courseList[index].credit);
	    courseChoosen[sl-1] = courseList[index].code;
	    $("#totalCredit").html(totalCredit);
	    $(".selected_courses table tbody").append('<tr class="active">\
							      <td>'+ parseInt(sl++) +'</td>\
							      <td class="course_name">'+ courseList[index].name +'</td>\
							      <td class="course_code">'+ courseList[index].code +'</td>\
							      <td class="course_credit">'+ courseList[index].credit +'</td>\
							      <td><select class="form-control remark"><option value="regular">Regular</option><option value="backlog">Backlog</option></select></td>\
							    </tr>');
	});


	$("#submit").click(function(){

		/*
		*	Validation
		*/
		var session = $("#session").val();
		if(session == ''){
			alert("Please enter session");
			$("#session").closest(".form-group").addClass("has-warning");
			return;
		}else{
			var pattern = new RegExp("[0-9]{4}-[0-9]{4}");
			if(!pattern.test(session)){
				alert("Use this formate 2011-2012");
				$("#session").closest(".form-group").addClass("has-error");
				return;
			}
		}


		/*
		*	Submit the form
		*/
		var year = $("#registration_year").val();
		var term = $("#registration_term").val();
		var session = $("#session").val();
		var selected_courses = [];
		$(".selected_courses table tbody tr").each(function(index){

			var courseName = $(".course_name", this).text();
			var courseCode = $(".course_code", this).text();
			var courseCredit = $(".course_credit", this).text();
			var courseName = $(".course_name", this).text();
			var remark = $(".remark", this).val();

			var selected_course = {name:courseName,code:courseCode,credit:courseCredit,remark:remark};

			selected_courses.push(selected_course);
		});
		var courses = JSON.stringify(selected_courses);

		var postData = {year:year, term:term, session:session, courses:courses};
		
		$.post(baseURL + "student/forward", postData, function(response){
			if(response == '1'){
				$("#success_alert").show(500);
				$("#submit").attr('disabled',true);
			}else{
				alert('please try again');
			}
		});

	});
	
	$(".course_registration").hide();

	$("#registration_term").on('change', function(){
		$(".course_registration").show();
		if($("#registration_term").val() == 'backlog' || $("#registration_term").val() == 'special_backlog'){
			$(".query_courses_row").show();
		}else{
			$(".available_courses").html('');
			var year = $("#registration_year").val();
			var term = $("#registration_term").val();
			$.get(baseURL + "/get/course/regular?year="+ year +"&term=" + term, function(response){
				courseList = JSON.parse(response);
				for(var i in courseList){
					$(".available_courses").append('<div class="course">\
														<div>\
												        <b><i style="color:green">'+ courseList[i].name +'</i></b>\
												        </div>\
														Code: <b>'+ courseList[i].code +'</b><br>\
														Credit: <b><span class="credit">'+ courseList[i].credit +'</span></b>\
														<input type="hidden" value="'+ i +'" class="index" />\
													</div>');
				}
				$(".query_courses_row").hide();
			});


		}
	});

});

function isAlreadyChoosen(courses, code){
	for(var i in courses){
		if(courses[i] == code) return true;
	}
	return false;
}

function checkMaxCourseChoosen(choosenCourse, toBeChoosenCourseCode){
	var total_theory = 0;
	var total_sessional = 0;
	for(var i in choosenCourse){
		var code = choosenCourse[i];
		code = code[code.length-2] + code[code.length-1];
		if(parseInt(code) % 2 == 0) total_sessional++;
		else total_theory++;
	}
	
	toBeChoosenCourseCode = toBeChoosenCourseCode[toBeChoosenCourseCode.length-2] + toBeChoosenCourseCode[toBeChoosenCourseCode.length-1];
	if(parseInt(toBeChoosenCourseCode) % 2 == 0) total_sessional++;
		else total_theory++;
	if(total_theory > 5) return false;
	if(total_sessional > 5) return false;
	return true;
}

function checkMaxCreditForBacklog(toBeChoosenCourseCredit){
	var total_credit = 0.0;
	$(".selected_course_table tbody tr td.course_credit").each(function(index){
		total_credit += parseFloat($(this).text());
	});
	if(total_credit+parseFloat(toBeChoosenCourseCredit) > 12){
		return false;
	}else{
		return true;
	}
}