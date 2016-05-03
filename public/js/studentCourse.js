$(document).ready(function(){
	$("#forward_button").hide();
	$("#show_course").click(function(){
		var forward_btn_flag = false;
		var year = $("#year").val();
		var term = $("#term").val();
		$("#course").html("");
		$.get('offered', {'year':year,'term':term}, function(res){
			if(res == 404) return;
			var courses = JSON.parse(res);
			var sl = 1;
			
			for(var i in courses){
				if(!forward_btn_flag){
					$("#course").html("<tr><th>SL No</th><th>Code</th><th>Course Title</th><th>Credit</th><th>Remark</th></tr>");
				}
				forward_btn_flag = true;

				$("#course").append("<tr><td>"+ sl +"</td><td>"+ courses[i].code +"</td><td>"+ courses[i].title +"</td><td>"+ courses[i].credit +"</td><td>regular</td></tr>");
				sl++;
			}
			if(forward_btn_flag){
				$("#forward_button").show();
			}
			
		});
		if(!forward_btn_flag){
			$("#forward_button").hide();
			$.get("/kuet/public/student/course-registration-status?year="+ year +"&term=" + term, function(res){
				if(res == '404'){
					$("#course").html("<h2 class=\"text-danger\">You are not offered for any course for this term</h2>");
				}
				if(res == 'adviser'){
					$("#course").html("<h2 class=\"text-success\">Your course registration procedure is pending for adviser's approval</h2>");
				}
			});
		}else{
			$("#forward_button").show();
		}
	});


	$("#forward_button").click(function(){
		$("#forward_button").attr('disabled', 'disabled');
		$("#forward_button").html("Please wait...");
		$.post('/kuet/public/student/forward', {'year':$("#year").val(), 'term':$("#term").val()}, function(res){
			if(res == '0'){
				alert('Sorry, we could not sent your request.')
			}else{
				alert('your request has been sent to the adviser.');
				location.reload();
			}
			$("#forward_button").removeAttr('disabled');
			$("#forward_button").html("forward to adviser");
		})
	});

});