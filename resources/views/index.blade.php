@extends('layouts.app')

@section('content')

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('/slideshow/interview.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Why make audio descriptions?</h2>
                    <p>What are audio descriptions? Why are they important?<br/><a href="#" class="btn btn-default">Learn more!</a></p>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('/slideshow/ww2_vet.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Best practices</h2>
                    <p>You know why audio descriptions are important, but do you know the best way to create them? Our online forum will has the answers you need!<br/><a href="/forum" class="btn btn-default">Join the forum!</a></p>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('/slideshow/learning.jpg');"></div>
                <div class="carousel-caption">
                    <h2>App store help</h2>
                    <p>Uploading apps to the Google and iOS stores can be confusing. Read, watch, and listen to our guides!<br/><a href="#" class="btn btn-default">View our guides!</a></p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    UniDescription - Easily create audio description apps!
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><em class="fa fa-fw fa-check"></em> iOS and Android support</strong>
                    </div>
                    <div class="panel-body">
                        <p>The apps we generate are ready for you to upload into the Android and iOS app stores!</p>
                        <a href="#" class="btn btn-default">Click for our guides!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><em class="fa fa-fw fa-gift"></em> Free &amp; Open Source</strong>
                    </div>
                    <div class="panel-body">
                        <p>This project is available for everyone to use, update, and learn from!</p>
                        <a href="#" class="btn btn-default">GitHub project page</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><em class="fa fa-fw fa-compass"></em> Easy to Use</strong>
                    </div>
                    <div class="panel-body">
                        <p>The UniDescription creator has been designed to make audio description projects as easy to create as possible.</p>
                        <a href="#" class="btn btn-default">Get started!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our favorite audio descriptions</h2>
            </div>
            <?php
	            $dh = opendir($_SERVER['DOCUMENT_ROOT'].'/portfolio/');
	            $images = array();
	            while ($file = readdir($dh)) {
		            if (preg_match("/.jpg$/", $file)) {
			        	$images[] = $file;
		            }
	            }
	            
	            foreach ($images as $image) {
		            ?>
			            <div class="col-md-4 col-sm-6" style="padding-bottom: 15px;">
			                <a href="portfolio-item.html">
			                    <img class="img-responsive img-portfolio img-hover" src="/portfolio/<?php echo $image; ?>" alt="">
			                </a>
			                Lorem ipsum dolor sit amet
			            </div>
			        <?
	            }
	        ?>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">UniDescription Features</h2>
            </div>
            <div class="col-md-6">
                <p>UniDescription features:</p>
                <ul>
                    <li><strong>iOS and Android app generation</strong>
                    </li>
                    <li>Audio file generation</li>
                    <li>Manage multiple projects</li>
                    <li>Forum for asking questions and helping others</li>
                    <li>New features added often!</li>
                </ul>
                <p>The goal of the UniDescription project is to make it easy for non-technical users to create audio descriptions.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius justo lorem, eu lacinia tellus commodo at. Etiam eget leo non sem dictum dictum lobortis at dui. Curabitur dignissim nibh vel dui pellentesque tincidunt et id mi. Nulla metus augue, pharetra et orci eget, semper commodo nisl. Pellentesque fermentum metus in tortor maximus sodales. Sed at malesuada lectus, tincidunt volutpat leo. Nulla quis odio ac nunc malesuada eleifend. Morbi at risus diam.</p>

				<p>Vivamus sit amet odio risus. Fusce maximus ut neque vel efficitur. Aenean commodo tellus sit amet posuere volutpat. Etiam euismod sollicitudin quam, nec venenatis risus mattis sit amet. Quisque in pulvinar neque. Donec laoreet nisi nisi, id pharetra magna cursus ut. Nulla quis ligula sed mauris semper porta. Phasellus rutrum metus in nisl aliquam, a dignissim nunc auctor. Nullam ut urna sed ante volutpat laoreet. Nulla nisl lacus, imperdiet vitae dui et, placerat sodales orci.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="/images/fifth_ohio.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Create Now!</a>
                </div>
            </div>
        </div>

        <hr>

    </div>
@endsection

@section('js')
        <!-- Script to Activate the Carousel -->
	    <script type="text/javascript">
		    $( document ).ready(function() { 
			    $('.carousel').carousel({
			        interval: 5000 //changes the speed
			    })
	    	});
	    </script>
@endsection