<!DOCTYPE html>


<html lang="en">
<head>
<?php
session_start();
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {

	header('location:./../login.php');
	exit();
}
?>
<!-- <h2>Anda Sebagai <?=$_SESSION['nama'];?></h2> -->

<a href="./../logout.php">Logout</a>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
<title>Halaman Admin</title>

<link href="../main/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../main/css/londinium-theme.css" rel="stylesheet" type="text/css">
<link href="../main/css/styles.css" rel="stylesheet" type="text/css">
<link href="../main/css/icons.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="../main/js/plugins/charts/sparkline.min.js"></script>

<script type="text/javascript" src="../main/js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/switch.min.js"></script>

<script type="text/javascript" src="../main/js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/uploader/plupload.queue.min.js"></script>

<script type="text/javascript" src="../main/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="../main/js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="../main/js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="../main/js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="../main/js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="../main/js/plugins/interface/timepicker.min.js"></script>

<script type="text/javascript" src="../main/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../main/js/application.js"></script>

</head>

<body>

	<!-- Navbar -->
	<div class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Londinium"></a>
			<a class="sidebar-toggle"><i class="icon-paragraph-justify2"></i></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
				<span class="sr-only">Toggle navbar</span>
				<i class="icon-grid3"></i>
			</button>
			<button type="button" class="navbar-toggle offcanvas">
				<span class="sr-only">Toggle navigation</span>
				<i class="icon-paragraph-justify2"></i>
			</button>
		</div>

		<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-people"></i>
					<span class="label label-default">2</span>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Activity</span>
						<a href="#" class="pull-right"><i class="icon-paragraph-justify"></i></a>
					</div>
	                <ul class="activity">
		                <li>
		                	<i class="icon-cart-checkout text-success"></i>
		                	<div>
			                	<a href="#">Eugene</a> ordered 2 copies of <a href="#">OEM license</a>
			                	<span>14 minutes ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-heart text-danger"></i>
		                	<div>
			                	Your <a href="#">latest post</a> was liked by <a href="#">Audrey Mall</a>
			                	<span>35 minutes ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-checkmark3 text-success"></i>
		                	<div>
			                	Mail server was updated. See <a href="#">changelog</a>
			                	<span>About 2 hours ago</span>
		                	</div>
		                </li>
		                <li>
		                	<i class="icon-paragraph-justify2 text-warning"></i>
		                	<div>
			                	There are <a href="#">6 new tasks</a> waiting for you. Don't forget!
			                	<span>About 3 hours ago</span>
		                	</div>
		                </li>
	                </ul>
                </div>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-paragraph-justify2"></i>
					<span class="label label-default">6</span>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Messages</span>
						<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
					</div>
					<ul class="popup-messages">
						<li class="unread">
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Eugene Kopyov <i class="icon-attachment2"></i></strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Jason Goldsmith <i class="icon-attachment2"></i></strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Angel Novator</strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Monica Bloomberg</strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="http://placehold.it/300" alt="" class="user-face">
								<strong>Patrick Winsleur</strong>
								<span>Aliquam interdum convallis massa...</span>
							</a>
						</li>
					</ul>
				</div>
			</li>

			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle">
					<i class="icon-grid"></i>
				</a>
				<div class="popup dropdown-menu dropdown-menu-right">
					<div class="popup-header">
						<a href="#" class="pull-left"><i class="icon-spinner7"></i></a>
						<span>Tasks list</span>
						<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
					</div>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Description</th>
								<th>Category</th>
								<th class="text-center">Priority</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span class="status status-success item-before"></span> <a href="#">Frontpage fixes</a></td>
								<td><span class="text-smaller text-semibold">Bugs</span></td>
								<td class="text-center"><span class="label label-success">87%</span></td>
							</tr>
							<tr>
								<td><span class="status status-danger item-before"></span> <a href="#">CSS compilation</a></td>
								<td><span class="text-smaller text-semibold">Bugs</span></td>
								<td class="text-center"><span class="label label-danger">18%</span></td>
							</tr>
							<tr>
								<td><span class="status status-info item-before"></span> <a href="#">Responsive layout changes</a></td>
								<td><span class="text-smaller text-semibold">Layout</span></td>
								<td class="text-center"><span class="label label-info">52%</span></td>
							</tr>
							<tr>
								<td><span class="status status-success item-before"></span> <a href="#">Add categories filter</a></td>
								<td><span class="text-smaller text-semibold">Content</span></td>
								<td class="text-center"><span class="label label-success">100%</span></td>
							</tr>
							<tr>
								<td><span class="status status-success item-before"></span> <a href="#">Media grid padding issue</a></td>
								<td><span class="text-smaller text-semibold">Bugs</span></td>
								<td class="text-center"><span class="label label-success">100%</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>

			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="http://placehold.it/300">
					<span>Eugene Kopyov</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right icons-right">
					<li><a href="#"><i class="icon-user"></i> Profile</a></li>
					<li><a href="#"><i class="icon-bubble4"></i> Messages</a></li>
					<li><a href="#"><i class="icon-cog"></i> Settings</a></li>
					<li><a href="#"><i class="icon-exit"></i> Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /navbar -->


	<!-- Page container -->
 	<div class="page-container">


		<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-content">

				<!-- User dropdown -->
				<div class="user-menu dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="http://placehold.it/300">
						<div class="user-info">
							Madison Gartner <span>Web Developer</span>
						</div>
					</a>
					<div class="popup dropdown-menu dropdown-menu-right">
					    <div class="thumbnail">
					    	<div class="thumb">
								<img src="http://placehold.it/300">
								<div class="thumb-options">
									<span>
										<a href="#" class="btn btn-icon btn-success"><i class="icon-pencil"></i></a>
										<a href="#" class="btn btn-icon btn-success"><i class="icon-remove"></i></a>
									</span>
								</div>
						    </div>
					    
					    	<div class="caption text-center">
					    		<h6>Madison Gartner <small>Front end developer</small></h6>
					    	</div>
				    	</div>

				    	<ul class="list-group">
							<li class="list-group-item"><i class="icon-pencil3 text-muted"></i> My posts <span class="label label-success">289</span></li>
							<li class="list-group-item"><i class="icon-people text-muted"></i> Users online <span class="label label-danger">892</span></li>
							<li class="list-group-item"><i class="icon-stats2 text-muted"></i> Reports <span class="label label-primary">92</span></li>
							<li class="list-group-item"><i class="icon-stack text-muted"></i> Balance <h5 class="pull-right text-danger">$45.389</h5></li>
						</ul>
					</div>
				</div>
				<!-- /user dropdown -->


				<!-- Main navigation -->
				<ul class="navigation">
					<li class="active"><a href="index.html"><span>Dashboard</span> <i class="icon-screen2"></i></a></li>
					<li>
						<a href="#"><span>Form components</span> <i class="icon-paragraph-justify2"></i></a>
						<ul>
							<li><a href="form_components.html">Form components</a></li>
							<li><a href="form_layouts.html">Form layouts</a></li>
							<li><a href="form_grid.html">Inputs grid</a></li>
							<li><a href="wysiwyg.html">WYSIWYG editor</a></li>
							<li><a href="validation.html">Validation</a></li>
							<li><a href="file_uploader.html">Multiple file uploader</a></li>
							<li><a href="form_snippets.html">Form snippets</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Interface components</span> <i class="icon-grid"></i></a>
						<ul>
							<li><a href="visuals.html">Visuals &amp; notifications</a></li>
							<li><a href="navs.html">Navs</a></li>
							<li><a href="panel_options.html">Panel options</a></li>
							<li><a href="navbars.html">Navbars</a></li>
							<li><a href="info_blocks.html">Info blocks</a></li>
							<li><a href="icons.html">Icons <span class="label label-danger">850+</span></a></li>
							<li><a href="buttons.html">Buttons</a></li>
							<li><a href="calendar.html">Calendar</a></li>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="gallery.html">Media gallery</a></li>
							<li><a href="header_elements.html">Page header elements</a></li>
							<li><a href="content_grid.html">Content grid</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Layouts</span> <i class="icon-copy"></i></a>
						<ul>
							<li><a href="sidebar_wide_left.html">Left wide sidebar</a></li>
							<li><a href="sidebar_wide_right.html">Right wide sidebar</a></li>
							<li><a href="sidebar_narrow_left.html">Left narrow sidebar</a></li>
							<li><a href="sidebar_narrow_right.html">Right narrow sidebar</a></li>
							<li><a href="sidebar_icons_left.html">Left aligned icons</a></li>
							<li><a href="layout_boxed.html">Boxed layout <span class="label label-danger">New</span></a></li>
							<li><a href="layout_fixed_navbar.html">Fixed navbar</a></li>
							<li><a href="horizontal_navigation.html">Horizontal navigation</a></li>
							<li><a href="horizontal_sidebar.html">Sidebar &amp; Horizontal navigation</a></li>
							<li><a href="navigation_disabled_items.html">Disabled navigation items</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Task manager</span> <i class="icon-numbered-list"></i></a>
						<ul>
							<li><a href="task_grid.html">Task grid</a></li>
							<li><a href="task_list.html">Task list</a></li>
							<li><a href="task_detailed.html">Task detailed</a></li>
						</ul>
					</li>
					<li><a href="charts.html"><span>Charts</span> <i class="icon-bars"></i></a></li>
					<li>
						<a href="#"><span>User</span> <i class="icon-user"></i></a>
						<ul>
							<li><a href="team.html">Team</a></li>
							<li><a href="contacts.html">Contact list</a></li>
							<li><a href="profile.html">User profile</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Support</span> <i class="icon-bubble6"></i></a>
						<ul>
							<li><a href="faq.html">FAQ's</a></li>
							<li><a href="chat_tabs.html">Chat with tabs</a></li>
							<li><a href="chat_contacts.html">Chat with contacts</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Tables</span> <i class="icon-table2"></i></a>
						<ul>
							<li><a href="tables_static.html">Static tables</a></li>
							<li><a href="tables_dynamic.html">Data tables</a></li>
						</ul>
					</li>
					<li><a href="search.html"><span>Search page</span> <i class="icon-search3"></i></a></li>
					<li>
						<a href="#"><span>Invoice</span> <i class="icon-coin"></i></a>
						<ul>
							<li><a href="invoice.html">Invoice template</a></li>
							<li><a href="invoice_list.html">Invoice list</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Login page</span> <i class="icon-user-plus"></i></a>
						<ul>
							<li><a href="login_simple.html">Simple login form</a></li>
							<li><a href="login_advanced.html">Login form with user image</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Error pages</span> <i class="icon-warning"></i></a>
						<ul>
							<li><a href="403.html">403 page</a></li>
							<li><a href="404.html">404 page</a></li>
							<li><a href="405.html">405 page</a></li>
							<li><a href="500.html">500 page</a></li>
							<li><a href="503.html">503 page</a></li>
							<li><a href="offline.html">Offline page</a></li>
							<li><a href="error_sidebar.html">Error page with sidebar</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Blank pages</span> <i class="icon-insert-template"></i></a>
						<ul>
							<li><a href="blank_left_sidebar.html">Left sidebar</a></li>
							<li><a href="blank_right_sidebar.html">Right sidebar</a></li>
							<li><a href="blank_collapsed_sidebar.html">Collapsed sidebar</a></li>
							<li><a href="blank_full_width.html">Full width page</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><span>Navigation levels</span> <i class="icon-stack"></i></a>
						<ul>
							<li><a href="#">Second level first item</a></li>
							<li><a href="#">Second level second item</a>
								<ul>
									<li><a href="#">Third level first item</a></li>
									<li><a href="#">Third level third item</a>
										<ul>
											<li><a href="#">Fourth level first item</a></li>
											<li><a href="#">Fourth level second item</a></li>
											<li><a href="#">Fourth level third item</a></li>
										</ul>
									</li>
									<li><a href="#">Third level second item</a></li>
									<li><a href="#">Third level third item</a>
										<ul>
											<li><a href="#">Fourth level first item</a></li>
											<li><a href="#">Fourth level second item</a></li>
											<li><a href="#">Fourth level third item</a></li>
										</ul>
									</li>
									<li><a href="#">Third level second item</a></li>
								</ul>
							</li>
							<li><a href="#">Second level third item</a></li>
						</ul>
					</li>
				</ul>
				<!-- /main navigation -->
				
			</div>
		</div>
		<!-- /sidebar -->


		<!-- Page content -->
	 	<div class="page-content">


			<!-- Page header -->
			<div class="page-header">
				<div class="page-title">
					<h3>Dashboard <small>Welcome Eugene. 12 hours since last visit</small></h3>
				</div>

				<div id="reportrange" class="range">
					<div class="visible-xs header-element-toggle">
						<a class="btn btn-primary btn-icon"><i class="icon-calendar"></i></a>
					</div>
					<div class="date-range"></div>
					<span class="label label-danger">9</span>
				</div>
			</div>
			<!-- /page header -->


			<!-- Breadcrumbs line -->
			<div class="breadcrumb-line">
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Dashboard</li>
				</ul>

				<div class="visible-xs breadcrumb-toggle">
					<a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i class="icon-menu2"></i></a>
				</div>

				<ul class="breadcrumb-buttons collapse">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search3"></i> <span>Search</span> <b class="caret"></b></a>
						<div class="popup dropdown-menu dropdown-menu-right">
							<div class="popup-header">
								<a href="#" class="pull-left"><i class="icon-paragraph-justify"></i></a>
								<span>Quick search</span>
								<a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
							</div>
							<form action="#" class="breadcrumb-search">
								<input type="text" placeholder="Type and hit enter..." name="search" class="form-control autocomplete">
								<div class="row">
									<div class="col-xs-6">
										<label class="radio">
											<input type="radio" name="search-option" class="styled" checked="checked">
											Everywhere
										</label>
										<label class="radio">
											<input type="radio" name="search-option" class="styled">
											Invoices
										</label>
									</div>

									<div class="col-xs-6">
										<label class="radio">
											<input type="radio" name="search-option" class="styled">
											Users
										</label>
										<label class="radio">
											<input type="radio" name="search-option" class="styled">
											Orders
										</label>
									</div>
								</div>

								<input type="submit" class="btn btn-block btn-success" value="Search">
							</form>
						</div>
					</li>

					<li class="language dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/flags/german.png" alt=""> <span>German</span> <b class="caret"></b></a>
						<ul class="dropdown-menu dropdown-menu-right icons-right">
							<li><a href="#"><img src="images/flags/ukrainian.png" alt=""> Ukrainian</a></li>
							<li class="active"><a href="#"><img src="images/flags/english.png" alt=""> English</a></li>
							<li><a href="#"><img src="images/flags/spanish.png" alt=""> Spanish</a></li>
							<li><a href="#"><img src="images/flags/german.png" alt=""> German</a></li>
							<li><a href="#"><img src="images/flags/hungarian.png" alt=""> Hungarian</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /breadcrumbs line -->


			<!-- Info blocks -->
			<ul class="info-blocks">
				<li class="bg-primary">
					<div class="top-info">
						<a href="#">Add new post</a>
						<small>post management</small>
					</div>
					<a href="#"><i class="icon-pencil"></i></a>
					<span class="bottom-info bg-danger">12 drafts in progress</span>
				</li>
				<li class="bg-success">
					<div class="top-info">
						<a href="#">Site parameters</a>
						<small>layout settings</small>
					</div>
					<a href="#"><i class="icon-cogs"></i></a>
					<span class="bottom-info bg-primary">No updates</span>
				</li>
				<li class="bg-danger">
					<div class="top-info">
						<a href="#">Site statistics</a>
						<small>visits, users, orders stats</small>
					</div>
					<a href="#"><i class="icon-stats2"></i></a>
					<span class="bottom-info bg-primary">3 new updates</span>
				</li>
				<li class="bg-info">
					<div class="top-info">
						<a href="#">My messages</a>
						<small>messages history</small>
					</div>
					<a href="#"><i class="icon-bubbles3"></i></a>
					<span class="bottom-info bg-primary">24 new messages</span>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="#">Orders history</a>
						<small>purchases statistics</small>
					</div>
					<a href="#"><i class="icon-cart2"></i></a>
					<span class="bottom-info bg-primary">17 new orders</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="#">Invoices stats</a>
						<small>invoices archive</small>
					</div>
					<a href="#"><i class="icon-coin"></i></a>
					<span class="bottom-info bg-danger">9 new invoices</span>
				</li>
			</ul>
			<!-- /info blocks -->


			<!-- Alert -->
			<div class="alert alert-warning fade in block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-info"></i> Nullam tincidunt dapibus nisi. Aenean porttitor egestas dolor, ut pretium enim vehicula at. Vivamus vulputate risus felis, eget blandit urna aliquam at
            </div>
            <!-- /alert -->


            <!-- Questions and contact -->
            <div class="row">
            	<div class="col-md-6">

                	<!-- Questions -->
                	<h6><i class="icon-question5"></i> Newest questions</h6>
			        <div class="panel-group block">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title panel-trigger">
									<a data-toggle="collapse" href="#question1">1. Morbi a nulla quis enim porttitor hasellus rutrum tincidunt lacus?</a>
								</h6>
							</div>
							<div id="question1" class="panel-collapse collapse">
								<div class="panel-body">
									<p class="alert alert-success fade in text-center">
						                <button type="button" class="close" data-dismiss="alert">×</button>
						                Maecenas imperdiet euismod rutrum. Vivamus at lacus vel nibh ullamcorper aliquam vel nec felis. Duis eu neque dignissim, imperdiet tellus vitae, interdum purus.
						            </p>		
						            <hr>							
									<p><strong>Praesent sollicitudin vulputate mauris, sodales auctor neque sollicitudin sed. Vestibulum non aliquet lorem, vel vehicula tellus. Vestibulum ante ipsum primis.</strong></p>
						            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title panel-trigger">
									<a data-toggle="collapse" href="#question2">2. Suspendisse rhoncus vulputate enim erat non euismod fermentum?</a>
								</h6>
							</div>
							<div id="question2" class="panel-collapse collapse">
								<div class="panel-body">
									<p class="alert alert-success fade in text-center">
						                <button type="button" class="close" data-dismiss="alert">×</button>
						                Maecenas imperdiet euismod rutrum. Vivamus at lacus vel nibh ullamcorper aliquam vel nec felis. Duis eu neque dignissim, imperdiet tellus vitae, interdum purus.
						            </p>		
						            <hr>							
									<p><strong>Praesent sollicitudin vulputate mauris, sodales auctor neque sollicitudin sed. Vestibulum non aliquet lorem, vel vehicula tellus. Vestibulum ante ipsum primis.</strong></p>
						            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title panel-trigger">
									<a data-toggle="collapse" href="#question3">3. Nullam non massa nec augue pharetra venenatis facilisis viverra?</a>
								</h6>
							</div>
							<div id="question3" class="panel-collapse collapse">
								<div class="panel-body">
									<p class="alert alert-success fade in text-center">
						                <button type="button" class="close" data-dismiss="alert">×</button>
						                Maecenas imperdiet euismod rutrum. Vivamus at lacus vel nibh ullamcorper aliquam vel nec felis. Duis eu neque dignissim, imperdiet tellus vitae, interdum purus.
						            </p>		
						            <hr>							
									<p><strong>Praesent sollicitudin vulputate mauris, sodales auctor neque sollicitudin sed. Vestibulum non aliquet lorem, vel vehicula tellus. Vestibulum ante ipsum primis.</strong></p>
						            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title panel-trigger">
									<a data-toggle="collapse" href="#question4">4. Aliquam at nisi eget lacus tincidunt semper?</a>
								</h6>
							</div>
							<div id="question4" class="panel-collapse collapse">
								<div class="panel-body">
									<p class="alert alert-success fade in text-center">
						                <button type="button" class="close" data-dismiss="alert">×</button>
						                Maecenas imperdiet euismod rutrum. Vivamus at lacus vel nibh ullamcorper aliquam vel nec felis. Duis eu neque dignissim, imperdiet tellus vitae, interdum purus.
						            </p>		
						            <hr>							
									<p><strong>Praesent sollicitudin vulputate mauris, sodales auctor neque sollicitudin sed. Vestibulum non aliquet lorem, vel vehicula tellus. Vestibulum ante ipsum primis.</strong></p>
						            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title panel-trigger">
									<a data-toggle="collapse" href="#question5">5. Vivamus sit amet nulla ac nulla iaculis blandit vitae?</a>
								</h6>
							</div>
							<div id="question5" class="panel-collapse collapse">
								<div class="panel-body">
									<p class="alert alert-success fade in text-center">
						                <button type="button" class="close" data-dismiss="alert">×</button>
						                Maecenas imperdiet euismod rutrum. Vivamus at lacus vel nibh ullamcorper aliquam vel nec felis. Duis eu neque dignissim, imperdiet tellus vitae, interdum purus.
						            </p>		
						            <hr>							
									<p><strong>Praesent sollicitudin vulputate mauris, sodales auctor neque sollicitudin sed. Vestibulum non aliquet lorem, vel vehicula tellus. Vestibulum ante ipsum primis.</strong></p>
						            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h6 class="panel-title panel-trigger">
									<a data-toggle="collapse" href="#question6">6. Nunc vitae eleifend sapien. Vestibulum et?</a>
								</h6>
							</div>
							<div id="question6" class="panel-collapse collapse">
								<div class="panel-body">
									<p class="alert alert-success fade in text-center">
						                <button type="button" class="close" data-dismiss="alert">×</button>
						                Maecenas imperdiet euismod rutrum. Vivamus at lacus vel nibh ullamcorper aliquam vel nec felis. Duis eu neque dignissim, imperdiet tellus vitae, interdum purus.
						            </p>		
						            <hr>							
									<p><strong>Praesent sollicitudin vulputate mauris, sodales auctor neque sollicitudin sed. Vestibulum non aliquet lorem, vel vehicula tellus. Vestibulum ante ipsum primis.</strong></p>
						            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>
					</div>
					<!-- Questions -->


					<!-- Simple contact form -->
					<form action="#" class="block validate" role="form">
						<h6 class="heading-hr"><i class="icon-support"></i> Contact support</h6>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Your name: <span class="mandatory">*</span></label>
		                            <input type="text" name="name" placeholder="Eugene" class="form-control required">
								</div>

								<div class="col-md-6">
									<label>Email address: <span class="mandatory">*</span></label>
		                            <input type="text" name="email_field" placeholder="your@email.com" class="form-control required">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Attach file:</label>
                                    <input type="file" class="styled" id="attach">
								</div>

								<div class="col-md-6">
									<label>Choose department:</label>
		                            <select data-placeholder="Select department" class="select-full" tabindex="2">
		                                <option value=""></option> 
		                                <option value="Support">Support (online)</option> 
		                                <option value="Sles">Sales department</option> 
		                                <option value="Lawers">Lawers</option> 
		                                <option value="Information">Information</option> 
		                                <option value="Administration">Web administration</option> 
		                            </select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Your message: <span class="mandatory">*</span></label>
							<textarea rows="5" cols="5" name="message" placeholder="Your message..." class="elastic form-control required"></textarea>
						</div>

		                <div class="text-right">
		                	<input type="reset" value="Cancel" class="btn btn-danger">
		                	<input type="submit" value="Send message" class="btn btn-primary">
		                </div>
					</form>
					<!-- /simple contact form -->

            	</div>

            	<div class="col-md-6">

		            <!-- Contacts -->
			    	<div class="block">
			    		<h6><i class="icon-paragraph-justify2"></i> Online contacts</h6>
			        	<ul class="message-list">

			        		<li class="message-list-header">Buddies</li>

			        		<li>
			                	<div class="clearfix">
			                		<div class="chat-member">
										<a href="#"><img src="http://placehold.it/300"></a> 
										<h6>Eugene Kopyov <span class="status status-success"></span> <small>&nbsp; /&nbsp; Wed developer</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs"><i class="icon-bubble3"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
			                	</div>
			        		</li>

			        		<li>
			                	<div class="clearfix">
			                		<div class="chat-member">
										<a href="#"><img src="http://placehold.it/300"></a> 
										<h6>Duncan McMart <span class="status status-default"></span> <small>&nbsp; /&nbsp; Wed designer</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs"><i class="icon-bubble3"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
			                	</div>
			        		</li>

			        		<li>
			                	<div class="clearfix">
			                		<div class="chat-member">
										<a href="#"><img src="http://placehold.it/300"></a> 
										<h6>Lucy Smith <span class="status status-warning"></span> <small>&nbsp; /&nbsp; UI expert</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs"><i class="icon-bubble3"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
			                	</div>
			        		</li>

			        		<li class="message-list-header">Colleagues</li>

			        		<li>
			                	<div class="clearfix">
			                		<div class="chat-member">
										<a href="#"><img src="http://placehold.it/300"></a> 
										<h6>Angel Nowak <span class="status status-default"></span> <small>&nbsp; /&nbsp; Usability expert</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs"><i class="icon-bubble3"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
			                	</div>
			        		</li>

			        		<li>
			                	<div class="clearfix">
			                		<div class="chat-member">
										<a href="#"><img src="http://placehold.it/300"></a> 
										<h6>Vin Dins <span class="status status-danger"></span> <small>&nbsp; /&nbsp; Wed developer</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs"><i class="icon-bubble3"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
			                	</div>
			        		</li>

			        		<li class="message-list-header">Remote team members</li>

			        		<li>
			                	<div class="clearfix">
			                		<div class="chat-member">
										<a href="#"><img src="http://placehold.it/300"></a> 
										<h6>Robert Razinsky <span class="status status-default"></span> <small>&nbsp; /&nbsp; Usability expert</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs"><i class="icon-bubble3"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
			                	</div>
			        		</li>

			        		<li>
			                	<div class="clearfix">
			                		<div class="chat-member">
										<a href="#"><img src="http://placehold.it/300"></a> 
										<h6>Malik Smitsons <span class="status status-danger"></span> <small>&nbsp; /&nbsp; Usability expert</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs"><i class="icon-bubble3"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a>
										<a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
			                	</div>
			        		</li>

			        	</ul>
			    	</div>
			    	<!-- contacts -->

            	</div>

            </div>
            <!-- /questions and contact -->


            <!-- Newest team members -->
            <h6><i class="icon-people"></i> New team members</h6>
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="block">
						<div class="thumbnail">
							<a href="#" class="thumb-zoom lightbox" title="Eugene A. Kopyov">
								<img src="http://placehold.it/300">
							</a>
						
					    	<div class="caption text-center">
					    		<h6>Eugene A. Kopyov <small>UX designer</small></h6>
				    			<div class="icons-group">
			                    	<a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			                    	<a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                    	<a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                    	</div>
					    	</div>
				    	</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="block">
				    	<div class="thumbnail">
							<a href="#" class="thumb-zoom lightbox" title="Sophia R. McJamer">
						    	<img src="http://placehold.it/300">
					    	</a>
					    
					    	<div class="caption text-center">
					    		<h6>Sophia R. McJamer <small>Media designer</small></h6>
				    			<div class="icons-group">
			                    	<a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			                    	<a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                    	<a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                    	</div>
					    	</div>
				    	</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="block">
				    	<div class="thumbnail">
							<a href="#" class="thumb-zoom lightbox" title="Noah Kennedy">
						    	<img src="http://placehold.it/300">
					    	</a>
					    
					    	<div class="caption text-center">
					    		<h6>Noah Kennedy <small>CEO &amp; founder</small></h6>
				    			<div class="icons-group">
			                    	<a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			                    	<a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                    	<a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                    	</div>
					    	</div>
				    	</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="block">
				    	<div class="thumbnail">
							<a href="#" class="thumb-zoom lightbox" title="Will DeBrandon">
						    	<img src="http://placehold.it/300">
					    	</a>
					    
					    	<div class="caption text-center">
					    		<h6>Will DeBrandon <small>Print designer</small></h6>
				    			<div class="icons-group">
			                    	<a href="#" title="Google Drive" class="tip"><i class="icon-google-drive"></i></a>
			                    	<a href="#" title="Twitter" class="tip"><i class="icon-twitter"></i></a>
			                    	<a href="#" title="Github" class="tip"><i class="icon-github3"></i></a>
		                    	</div>
					    	</div>
				    	</div>
					</div>
				</div>
			</div>
            <!-- /newest team members -->


			<!-- Alert -->
			<div class="alert alert-success fade in block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-info"></i> Nullam tincidunt dapibus nisi. Aenean porttitor egestas dolor, ut pretium enim vehicula at. Vivamus vulputate risus felis, eget blandit urna aliquam at
            </div>
            <!-- /alert -->


	        <!-- Tasks table -->
	        <div class="block">
	        	<h6 class="heading-hr"><i class="icon-grid"></i> Recent tasks</h6>
	            <div class="datatable-tasks">
	                <table class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>Task Description</th>
	                            <th class="task-priority">Priority</th>
	                            <th class="task-date-added">Date Added</th>
	                            <th class="task-progress">Progress</th>
	                            <th class="task-deadline">Deadline</th>
	                            <th class="task-tools text-center">Tools</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Donec suscipit ultrices commodo. Suspendisse potenti</a>
	                            	<span>General layout additions</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>September 20, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
											<span class="sr-only">90% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">14</strong> hours left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Donec sagittis sit amet felis non semper</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>September 18, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
											<span class="sr-only">40% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Pellentesque sed nibh non neque auctor ornare ac in est</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-info">Low</span></td>
	                            <td>September 2, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;">
											<span class="sr-only">12% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">18</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Pellentesque habitant morbi tristique senectus et netus</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-success">Normal</span></td>
	                            <td>August 21, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
											<span class="sr-only">50% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">7</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Et malesuada fames ac turpis egestas</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>August 12, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">90</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Maecenas eros nisl, tempor vitae dolor eu</a>
	                            	<span>General layout additions</span>
	                            </td>
	                            <td class="text-center"><span class="label label-success">Normal</span></td>
	                            <td>August 7, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;">
											<span class="sr-only">41% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">62</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Nunc gravida, nunc vel condimentum mattis</a>
	                            	<span>General layout additions</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>July 30, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
											<span class="sr-only">40% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">21</strong> hour left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Rhoncus rutrum metus neque rutrum tortor</a>
	                            	<span>General layout additions</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>July 26, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
											<span class="sr-only">60% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">62</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Fusce sapien velit, accumsan eget risus et</a>
	                            	<span>General layout additions</span>
	                            </td>
	                            <td class="text-center"><span class="label label-info">Low</span></td>
	                            <td>July 22, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
											<span class="sr-only">40% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">51</strong> day left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Suspendisse dictum vitae ante ut tempor</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-info">Low</span></td>
	                            <td>July 10, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;">
											<span class="sr-only">6% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Maecenas porta augue et odio dignissim</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-info">Low</span></td>
	                            <td>June 25, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;">
											<span class="sr-only">65% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">3</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Morbi varius odio at quam vehicula mattis</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-success">Normal</span></td>
	                            <td>June 21, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
											<span class="sr-only">20% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">89</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Quisque ultrices libero in nisl fringilla</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>June 17, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
											<span class="sr-only">40% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">32</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Nam fermentum ut nunc eget tristique</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>June 14, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;">
											<span class="sr-only">31% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Etiam viverra porttitor auctor</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-success">Normal</span></td>
	                            <td>June 3, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
											<span class="sr-only">90% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">1</strong> day left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Curabitur quis commodo massa. Proin eget arcu eros</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>May 9, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
											<span class="sr-only">10% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">2</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Maecenas sed sapien vel nisi porta sollicitudin</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>May 2, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
											<span class="sr-only">40% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">37</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Nunc placerat mattis consectetur. Cras sagittis scelerisque imperdiet</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-info">Low</span></td>
	                            <td>April 21, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
											<span class="sr-only">10% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong class="text-danger">3</strong> days left</td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Nunc tincidunt consectetur quam et venenatis</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-info">Low</span></td>
	                            <td>April 19, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
											<span class="sr-only">100% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Phasellus quis sagittis orci, vitae placerat mauris</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-info">Low</span></td>
	                            <td>April 11, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
											<span class="sr-only">100% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Nunc sit amet arcu euismod nulla luctus pulvinar in at enim</a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>April 1, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
											<span class="sr-only">100% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Duis convallis ornare risus, sit amet tincidunt elit euismod vel</a>
	                            	<span>HTML / CSS changes</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>March 8, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
											<span class="sr-only">100% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                        <tr>
	                            <td class="task-desc">
	                            	<a href="task_detailed.html">Cras eu mauris adipiscing massa porttitor </a>
	                            	<span>Design &amp; UI concepts</span>
	                            </td>
	                            <td class="text-center"><span class="label label-danger">High</span></td>
	                            <td>March 2, 2013</td>
	                            <td>
	                            	<div class="progress progress-micro">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
											<span class="sr-only">100% Complete</span>
										</div>
									</div>
	                            </td>
	                            <td><i class="icon-clock"></i> <strong>Complete!</strong></td>
		                        <td class="text-center">
		                            <div class="btn-group">
			                            <button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown"><i class="icon-cog4"></i></button>
										<ul class="dropdown-menu icons-right dropdown-menu-right">
											<li><a href="#"><i class="icon-quill2"></i> Edit task</a></li>
											<li><a href="#"><i class="icon-share2"></i> Reassign</a></li>
											<li><a href="#"><i class="icon-checkmark3"></i> Complete</a></li>
											<li><a href="#"><i class="icon-stack"></i> Archive</a></li>
										</ul>
		                            </div>
		                        </td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	        <!-- /tasks table -->


        	<!-- Recent activity -->
			<div class="block">
				<h6 class="heading-hr"><i class="icon-file"></i> Recent activity</h6>
				<ul class="media-list">
					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/300" alt="">
						</a>
						<div class="media-body">
							<div class="clearfix">
								<a href="#" class="media-heading">Eugene Kopyov</a>
								<span class="media-notice">December 10, 2013 / 10:20 pm</span>
							</div>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
						</div>
					</li>

					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/300" alt="">
						</a>
						<div class="media-body">
							<div class="clearfix">
								<a href="#" class="media-heading">Martin Wolf</a>
								<span class="media-notice">December 12, 2013 / 10:14 pm</span>
							</div>
							Cras tempus pretium ligula, quis viverra purus eleifend et.
						</div>
					</li>

					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/300" alt="">
						</a>
						<div class="media-body">
							<div class="clearfix">
								<a href="#" class="media-heading">Duncan McMart</a>
								<span class="media-notice">January 3, 2014 / 12:14 pm</span>
							</div>
							Quisque dignissim nibh nec massa egestas interdum. Proin congue vulputate velit, sodales mattis neque tempor a.
						</div>
					</li>

					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/300" alt="">
						</a>
						<div class="media-body">
							<div class="clearfix">
								<a href="#" class="media-heading">Lucy Smith</a>
								<span class="media-notice">January 22, 2014 / 10:26 pm</span>
							</div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget orci non sem sodales dictum.
						</div>
					</li>

					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/300" alt="">
						</a>
						<div class="media-body">
							<div class="clearfix">
								<a href="#" class="media-heading">Angel Nowak</a>
								<span class="media-notice">January 24, 2014 / 10:20 am</span>
							</div>
							Mauris vulputate bibendum justo non pretium. Sed eleifend, est vitae pellentesque condimentum, lacus ligula consectetur dolor, a congue metus odio ut neque.
						</div>
					</li>

					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/300" alt="">
						</a>
						<div class="media-body">
							<div class="clearfix">
								<a href="#" class="media-heading">Barbara Madison</a>
								<span class="media-notice">February 2, 2014 / 10:47 pm</span>
							</div>
							Nullam vel massa blandit turpis sodales consectetur. Maecenas non mattis purus. Nullam vitae risus eu est.
						</div>
					</li>

					<li class="media">
						<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/300" alt="">
						</a>
						<div class="media-body">
							<div class="clearfix">
								<a href="#" class="media-heading">James Willings</a>
								<span class="media-notice">February 16, 2014 / 07:28 am</span>
							</div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus lacus, consequat et dui ut, ullamcorper sollicitudin lorem. Donec gravida eget nisi eget congue. Sed varius sollicitudin adipiscing.
						</div>
					</li>
				</ul>
        	</div>
        	<!-- /recent activity -->


	        <!-- Footer -->
	        <div class="footer clearfix">
		        <div class="pull-left">&copy; 2013. Londinium Admin Template by <a href="http://themeforest.net/user/Kopyov">Eugene Kopyov</a></div>
	        	<div class="pull-right icons-group">
	        		<a href="#"><i class="icon-screen2"></i></a>
	        		<a href="#"><i class="icon-balance"></i></a>
	        		<a href="#"><i class="icon-cog3"></i></a>
	        	</div>
	        </div>
	        <!-- /footer -->


		</div>
		<!-- /page content -->


	</div>
	<!-- /page container -->

</body>
</html>