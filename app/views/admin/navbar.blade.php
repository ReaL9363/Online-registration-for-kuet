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
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Student<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ URL::route('getcreateNewStudent') }}">Add new Student</a></li>
	          </ul>
	        </li>

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Teacher<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ URL::route('getcreateNewTeacher') }}">Add new Teacher</a></li>
	          </ul>
	        </li>

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Course<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ URL::route('getcreateNewCourse') }}">Add new Course</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Academic<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ URL::route('getAssignAdviser') }}">Assign Adviser</a></li>
	            <li><a href="{{ URL::route('getCourseOffer') }}">Offer Course</a></li>
	            <li><a href="{{ URL::route('getAdminCourseRegistrationRequest') }}">Pending Course Registration</a></li>
	          </ul>
	        </li>

	      </ul>
	      
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="{{ URL::route('getLogout') }}">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>