<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>UniDescription.com - @yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/nps-bootstrap.css">
    
    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="http://www.nps.gov/lib/bootstrap/3.3.2/js/nps-bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-filestyle.min.js"></script>

    <!-- Unidescription custom JS -->
    <script type="text/javascript" src="/js/unidescription.js"></script>

    
    <link href="/css/unidescription.css" rel="stylesheet">

	@yield('header')
    
  </head>
  <body>
    @section('navbar')
	    <!-- Navigation -->
	    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="/">UniDescription</a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right">
		                <li><a href="/guide">Guide</a></li>
	                    <li><a href="/faq">FAQ</a></li>
	                    <li><a href="/forum">Forum</a></li>
	                                            <li><a href="/about">About</a></li>

	                    <?php if (Auth::check()): ?>	                    	
	                    	<?php $projects = Auth::user()->all_projects(); ?>
	                    	<li class="dropdown">
		                        <a href="/account" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
		                        <ul class="dropdown-menu">
			                        <li><a href="/account">Account Activity</a></li>
		                        	<li><a href="/account/project/edit/0/new">Create New Project</a></li>
			                        <li><a href="/account/project">My Projects</a></li>
			                        @foreach ($projects as $project)
				                        <li class="small">
				                        	<a href="/account/project/edit/{{ $project->id }}/{{ strtolower(preg_replace('%[^a-z0-9_-]%six','-', $project->title)) }}">{{ $project->title }}</a></li>
			                        @endforeach
			                        <li class="divider"></li>
		                            <li><a href="/account/settings">Settings</a></li>
		                            <li><a href="/auth/logout">Sign Out</a></li>
		                        </ul>
							</li>							
						<?php else: ?>
							<li><a href="/auth/login">Sign In</a></li>
							<li><a href="/auth/register"><strong>Register</strong></a></li>

						<?php endif; ?>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>
    @show

    <div class="container">
	    
	    @if (count($errors))
		    <div class="alert alert-danger" role="alert">
		        @foreach($errors->all() as $error)
    			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Error:</span>
				  {{$error}}<br />
		        @endforeach
			</div>
		@endif
        
        @yield('content')
            
		<!-- Footer -->
		@section('footer')
		    <footer>
		        <div class="row">
		            <div class="col-lg-12 container">
			            <div class="pull-left">
				            <a href="/site-map">Site Map</a> |
				            <a href="/contact">Contact</a> |
				            <a href="/privacy-policy">Privacy Policy</a> |
				            <a href="/license">License</a>
			            </div>
			            <div class="pull-right">Copyright &copy; Mobile Media Matters {{ date('Y') }}</div>
		            </div>
		        </div>
		        <div class="row container" style="margin-top: 5px">
		            <ul class="list-unstyled list-inline list-social-icons">
	                    <li>
	                        <a href="https://github.com/MontanaBanana/unidescription.com" target="_blank"><em class="fa fa-github-square fa-2x"></em></a>
	                    </li>
	                    <li>
	                        <a href="#" target="_blank"><em class="fa fa-facebook-square fa-2x"></em></a>
	                    </li>
	                    <li>
	                        <a href="#" target="_blank"><em class="fa fa-linkedin-square fa-2x"></em></a>
	                    </li>
	                    <li>
	                        <a href="#" target="_blank"><em class="fa fa-twitter-square fa-2x"></em></a>
	                    </li>
	                    <li>
	                        <a href="#" target="_blank"><em class="fa fa-google-plus-square fa-2x"></em></a>
	                    </li>
	                </ul>
		        </div>
		    </footer>
		@show
	    
    </div>

	@section('js');
	@show
  </body>
</html>