<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>@if ($page_name != ""){{ $page_name }}@endif @if ($subpage_name != "") &raquo; {{ $subpage_name }}@endif | {{ env('App_Name') }} Admin</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content=""/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ url('admin/favicon.ico') }}">
	<link rel="icon" href="{{ url('admin/favicon.ico') }}" type="image/x-icon">
	

    <!-- Jasny-bootstrap CSS -->
    <link href="{{ url('admin/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    
		
	<!-- Custom CSS -->
	<link href="{{ url('admin/dist/css/style.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-red box-layout">
		<!-- Top Menu Items -->
		@include('administrative.layouts.header')
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		@include('administrative.layouts.leftmenu')
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		@include('administrative.layouts.rightmenu')
		<!-- /Right Sidebar Menu -->
		
        <!-- Main Content -->
		<div class="page-wrapper">
            @yield('main-container')
			
			<!-- Footer -->
			<!-- < ?php $this->load->view('wl-administrative/footer');?> -->
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="{{ url('admin/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ url('admin/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

	<!-- Slimscroll JavaScript -->
	<script src="{{ url('admin/dist/js/jquery.slimscroll.js') }}"></script>
	
	<!-- Owl JavaScript -->
	<script src="{{ url('admin/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	
	<!-- Switchery JavaScript -->
	<script src="{{ url('admin/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{ url('admin/dist/js/dropdown-bootstrap-extended.js') }}"></script>
    	
	<!-- Init JavaScript -->
	<script src="{{ url('admin/dist/js/init.js') }}"></script>
    					
   
</body>

</html>