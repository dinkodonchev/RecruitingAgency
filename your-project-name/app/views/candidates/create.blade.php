<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    @yield('stylesheets')

    <title>Recruiting Agency @yield('title')</title>
  </head>

  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="#">My Recruiting Agency</a>
 		 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		 </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
	      <li class="nav-item {{Request::is('/') ? "active" : ""}}">
	        <a class="nav-link" href="/">Users <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item {{Request::is('about') ? "active" : ""}}">
	        <a class="nav-link" href="/about">Candidates <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item {{Request::is('contact') ? "active" : ""}}">
	        <a class="nav-link" href="/contact">Job offers <span class="sr-only">(current)</span></a>
	      </li>

	      @if(Auth::check())

	      <li class="nav-item dropdown" style="margin-left: 50px;">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Hello {{ Auth::user()->name }}
	        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="/users">Users</a>
		          <a class="dropdown-item" href="/candidates">Candidates</a>
		          <a class="dropdown-item" href="/offers">Job offers</a>
		          
		          <div class="dropdown-divider"></div>
		          
		        </div>
	      	</li>

			      @else

			        <a class="dropdown-item" style="margin-top: 5px; margin-left: 350px;" href="/login">Login</a>

			      @endif

    	</ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
  </div>
</nav>

    

    <h1 class="text-center">Your new job opportunity!</h1>


   

    <div class="container">

      

    <div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Dashboard</div>

	                <div class="card-body">
	                    @if (session('status'))
	                        <div class="alert alert-success">
	                            {{ session('status') }}
	                        </div>
	                    @endif

	                    You are logged in!
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

      <hr>

      <p>Copyright Dinyo Donchev - All rights reserved</p>

</div>
    <!-- End of container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @yield('javascripts')

  </body>
</html>