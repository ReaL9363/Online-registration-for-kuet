	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{ URL::route('home') }}">Kuet</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      <ul class="nav navbar-nav">

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profile<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ URL::route('getUpdateStudentProfile') }}">Update Profile</a></li>
	          </ul>
	        </li>
			<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Course Registration<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ URL::route('getNewCourseRegistration') }}">New Course Registration</a></li>
	            <li><a href="{{ URL::route('getViewCourseRegistration') }}">View Course Registration</a></li>
	          </ul>
	        </li>
	        

	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="{{ URL::route('getAllNotifications') }}" id="notification">Notification
	      		<span class="badge" style="color:#fff; background:#e74c3c" id="notificationNum">0</span></a></li>
	        <li><a href="{{ URL::route('getLogout') }}">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>




	<script>

		$(document).ready(function(){
			$("#notificationNum").hide();
			$.get("{{ URL::route('home') }}/api/get/message", function(response){
				var notifications = JSON.parse(response);
				console.log(notifications.length);
				if(notifications.length > 0){
					$("#notificationNum").text(notifications.length);
					$("#notificationNum").show();
				}
			});
		});


	</script>