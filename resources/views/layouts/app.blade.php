<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
	<link rel="manifest" href="/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
    <title>UniD - @yield('title')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ SITEROOT }}/css/nps-bootstrap.css">
    
    <!-- Custom Fonts -->
    <link href="{{ SITEROOT }}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- RTE -->
    <link rel="stylesheet" href="{{ SITEROOT }}/css/trumbowyg.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="{{ SITEROOT }}/js/canvas-to-blob.min.js"></script>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script type="text/javascript" src="http://www.nps.gov/lib/bootstrap/3.3.2/js/nps-bootstrap.min.js"></script>-->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ SITEROOT }}/js/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="{{ SITEROOT }}/js/jquery-sortable.min.js"></script>
    <script type="text/javascript" src="{{ SITEROOT }}/js/autosize.js"></script>
    <!--<script type="text/javascript" src="{{ SITEROOT }}/js/jquery.mjs.nestedSortable.js"></script>-->

    <!-- RTE -->
    <script type="text/javascript" src="{{ SITEROOT }}/js/trumbowyg.js"></script>

    <!-- Unidescription custom JS -->
    <script type="text/javascript" src="{{ SITEROOT }}/js/unidescription.js"></script>

    <!-- cropper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.2/cropper.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.2/cropper.min.js"></script>
    
    <link href="{{ SITEROOT }}/css/unidescription.css" rel="stylesheet">

	@yield('header')
    
  </head>
  <body>
	@section('navbar')
	    <!-- Navigation -->
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header" id="main-nav">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="{{ SITEROOT }}/"><img src="/images/unid_logo.png" style="position: relative; top: -8px; border: none;" alt="UniDescription logo" /></a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right">
			    <li class="dropdown">
				<a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/guide" class="dropdown-toggle" data-toggle="dropdown">Guide <b class="caret"></b></a>
				<ul class="dropdown-menu">
				    <!--<li><a href="{{ SITEROOT }}/faq">FAQ</a></li>
				    <li><a href="{{ SITEROOT }}/tutorials">Tutorials</a></li>-->
				    <li><a href="{{ SITEROOT }}/unid-academy">UniD Academy</a></li>
				    <li><a href="{{ SITEROOT }}/forum">Forum</a></li>
				</ul>
			    </li>
			    <li class="dropdown">
				<a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/about" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
				<ul class="dropdown-menu">
				    <li><a href="{{ SITEROOT }}/about">About Us</a></li>
				    <li><a href="https://npsaudiodescription.wordpress.com/" target="_blank">Blog</a></li>
				</ul>
			    </li>
			    <!--<li><a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/guide">Guide</a></li>-->
	                    <!--<li><a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/forum">Forum</a></li>-->
	                    <!--<li><a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="https://npsaudiodescription.wordpress.com/" target="_blank">Blog</a></li>-->
	                    <!--<li><a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/about">About</a></li>-->

	                    <?php if (Auth::check()): ?>	                    	
	                    	<li class="dropdown">
		                        <a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/account" class="dropdown-toggle" data-toggle="dropdown">Projects <b class="caret"></b></a>
		                        <ul class="dropdown-menu">
		                        	<li><a href="{{ SITEROOT }}/account/project/details/0/new">Create New Project</a></li>
			                        <li class="divider"></li>
			                        <li><a href="{{ SITEROOT }}/account/project">My Projects</a></li>
                                    <?php 
                                        $my_projects = Auth::user()->projects; 
                                        $shared_projects = Auth::user()->shared_projects; 
                                    ?>
			                        @foreach ($my_projects as $project)
				                        <li class="small">
				                        	<a href="{{ SITEROOT }}/account/project/details/{{ $project->id }}/{{ strtolower(preg_replace('%[^a-z0-9_-]%six','-', $project->title)) }}">{{ $project->title }}</a></li>
			                        @endforeach
			                        <li class="divider"></li>
			                        <li><a href="{{ SITEROOT }}/account/project">Shared Projects</a></li>
			                        @foreach ($shared_projects as $project)
				                        <li class="small">
				                        	<a href="{{ SITEROOT }}/account/project/details/{{ $project->id }}/{{ strtolower(preg_replace('%[^a-z0-9_-]%six','-', $project->title)) }}">{{ $project->title }}</a></li>
			                        @endforeach
		                        </ul>
							</li>	
	                    	<li class="dropdown">
		                        <a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/account" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
		                        <ul class="dropdown-menu">
			                        <li><a href="{{ SITEROOT }}/account">Account Activity</a></li>
		                            <li><a href="{{ SITEROOT }}/account/settings">Settings</a></li>
		                            <?php if (! Auth::user()->pg_build_code) { ?>
		                            	<li><a href="{{ SITEROOT }}/phonegapbuild/authorize">PhoneGap Build Auth</a></li>
		                            <?php } ?>
		                            <li><a href="{{ SITEROOT }}/auth/logout">Sign Out</a></li>
		                        </ul>
							</li>
						<?php else: ?>
							<li><a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/auth/login">Sign In</a></li>
							<li><a style="font-size: 18px; line-height: 88px; height: 88px; padding-top: 0px" href="{{ SITEROOT }}/auth/register"><strong>Register</strong></a></li>

						<?php endif; ?>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>
    @show

    <div class="container" style="position: relative; top: 30px;">
	    
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
				            <a href="{{ SITEROOT }}/site-map">Site Map</a> |
				            <a href="{{ SITEROOT }}/contact">Contact</a> |
				            <a href="{{ SITEROOT }}/privacy-policy">Privacy Policy</a> |
				            <a href="{{ SITEROOT }}/license">License</a>
			            </div>
		            </div>
		        </div>
		        <div class="row container" style="margin-top: 5px">
		            <ul class="list-unstyled list-inline list-social-icons">
	                    <li>
	                        <a href="https://github.com/MontanaBanana/unidescription.com" target="_blank"><em class="fa fa-github-square fa-2x"></em></a>
	                    </li>
<!--
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
-->
	                </ul>
		        </div>
		    </footer>
		@show
	    
    </div>

	@section('js')
	@show

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-74229208-1', 'auto');
	  ga('send', 'pageview');

	</script>

    <script type="text/javascript" src="https://seattlemb.atlassian.net/s/facec166f3b90481a98c70aef7999867-T/mzwzae/100012/c/1000.0.9/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?locale=en-US&collectorId=c8cf07bc"></script>

  </body>
</html>
