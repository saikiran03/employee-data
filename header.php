<script src="js/header.js"></script>
<link href="css/header.css" rel="stylesheet">
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Gopi Is Gay</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<!-- Timer	 -->
			<p class="navbar-text" id="inac-meter"></p>
		
			<!-- Search Bar -->
			<form class="navbar-form navbar-left">
				<div class="form-group">
					<input type="text" class="form-control" id="empsearch" placeholder="Search by ID" onkeyup="ajaxCheck()" autofocus>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		
			<!-- Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php">Enter Data <span class="sr-only">(current)</span></a></li>
				<li><a href="fetchDb.php">Fetch Database</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Logged in as <?php echo session('username'); ?></a></li>
						<li role="separator" class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>


		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Search Results</h4>
			</div>
			<div class="modal-body">
				<ul id="employeeList">

				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
