<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>BankFx- Admin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url();?>assets/admin_panel/im" />

	<!-- Fonts and icons -->
	<script src="<?php echo base_url();?>assets/admin_panel/js/plugin/webfont/webfont.min.js"></script>


	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_panel/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_panel/css/atlantis.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/admin_panel/css/demo.css">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>

<body>
	<div class="wrapper">
		<input type="hidden" id="baseUrl" value="<?php echo base_url()?>"/>
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
					<!-- <img src="<?php echo base_url();?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?php echo base_url();?>assets/admin_panel/img/admin.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo base_url();?>assets/admin_panel/img/admin.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4 class="header_admin_name"></h4>
												<p class="text-muted header_admin_email"></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url()?>admin/profile">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url()?>admin/logout">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url();?>assets/admin_panel/img/admin.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<span class="header_admin_name">Admin</span>
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?php echo base_url()?>index.php/admin/profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active" id="dashboard">
							<a href="<?php echo base_url();?>index.php/admin/dashboard" class="collapsed" aria-expanded="false">
								<i class="flaticon-analytics"></i>
								<p>Dashboard</p>
							</a>
						</li>
						
						<li class="nav-item " id="users_list">
							<a href="<?php echo base_url();?>index.php/admin/user_list">
								<i class="flaticon-users"></i>
								<p>Registered Users</p>
							</a>
						</li>
					
						<!-- / -->
						
						<!-- <li class="nav-item" id="">
							<a data-toggle="collapse" href="#userPolicies">
								<i class="flaticon-list"></i>
								<p>User Policies</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="userPolicies">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url()?>policy/user/terms_conditions">
											<span class="sub-item">Terms and Conditions</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>policy/user/advert_policy">
											<span class="sub-item">Advert Policy</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>policy/user/referral_policy">
											<span class="sub-item">Referral Policy</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>policy/user/refund_policy">
											<span class="sub-item">Refund Policy</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>policy/user/warranty_policy">
											<span class="sub-item">Warranty Policy</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>policy/user/privacy_policy">
											<span class="sub-item">Privacy Policy</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>policy/user/contact_us">
											<span class="sub-item">Contact Us</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->

						<li class="nav-item" id="">
							<a data-toggle="collapse" href="#websiteView">
								<i class="flaticon-list"></i>
								<p>Website Content</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="websiteView">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url()?>admin/website_page/about_us">
											<span class="sub-item">About Us</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>admin/website_page/terms_conditions">
											<span class="sub-item">Terms and Conditions</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url()?>admin/website_page/privacy_policy">
											<span class="sub-item">Privacy Policy</span>
										</a>
									</li>
								
								</ul>
							</div>
						</li>

						<!-- <li class="nav-item" id="bulk_emails">
							<a href="<?php echo base_url();?>bulk_emails">
								<i class="flaticon-envelope-1"></i>
								<p>Send Bulk Emails</p>
							</a>
						</li> -->

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->