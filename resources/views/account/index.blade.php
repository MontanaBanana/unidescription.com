@extends('layouts.app')

@section('content')


        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Account
                    <small>Activity Stream</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">My Account</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Account info -->
        <div class="row">
            <div class="col-md-12">
	            <p><h2>Activity Stream</h2>
            </div>
        </div>
        <!-- /.row -->
        
        <?php for ($i = 0; $i < 6; $i++): ?>
		        <div class="row">
			        <div class="col-md-2"><p><?php echo prettyDate('2015-12-1');?></p></div>
		        </div>
		        <div class="row">
		            <div class="col-md-2">
			        	<img class="thumbnail" src="/images/accounts/1.jpeg" width="100%" />
		            </div>
		            <div class="col-md-10">
			            <a href="#">Joe Oppegaard</a> shared <a href="#">Fort Vancouver</a> with <a href="#">George Washington</a>
			            <div style="margin-top: 10px;">
				            <div class="col-md-2">
					            <img class="thumbnail" src="/images/projects/41.jpeg" width="100%" />
				            </div>
				            <div class="col-md-10">
					            <a href="#">Fort Vancouver</a><br />
					            Explore the lands and structures at the center of fur trade and military history in the Pacific Northwest. Learn about the diverse cultures who lived and worked here. Enjoy relaxing trails along the Columbia River and Village. 
				            </div>
			            </div>
		            </div>
		        </div>
		        <!-- /.row -->
		        <hr>
		<?php endfor; ?>

@endsection