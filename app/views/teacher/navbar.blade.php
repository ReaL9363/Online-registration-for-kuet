	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Kuet</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      <ul class="nav navbar-nav">

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profile<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ URL::route('getUpdateTeachersProfile') }}">Update Profile</a></li>
	          </ul>
	        </li>

	        <li><a href="{{ URL::route('getTeacherCourseRegistration') }}">Course Registration</a></li>

	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="{{ URL::route('getLogout') }}">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>