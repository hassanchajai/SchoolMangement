<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="School Management">
	<meta name="keywords" content="School Management">


	<link rel="shortcut icon" href="public/img/icons/icon-48x48.png" />

	<title>HassanDev</title>

	<link href="public/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">School Management</span>
				</a>

				<ul class="sidebar-nav">
				

					<li class="sidebar-item <?php echo $_GET["url"]=="dashboard" ? "active" :"" ?>">
						<a class="sidebar-link" href="dashboard">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item <?php echo strtolower($_GET["url"])=="salle" ? "active" :"" ?>">
						<a class="sidebar-link" href="Salle">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Salle</span>
						</a>
					</li>

					<li class="sidebar-item <?php echo strtolower($_GET["url"])=="group" ? "active" :"" ?>">
						<a class="sidebar-link" href="group">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Group</span>
						</a>
					</li>
					<li class="sidebar-item <?php echo strtolower($_GET["url"])=="ens" ? "active" :"" ?>">
						<a class="sidebar-link" href="ens">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Ens</span>
						</a>
					</li>

			
			

					<li class="sidebar-item">
						<a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Auth</span>
						</a>
						<ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign In</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign Up</a></li>
						</ul>
					</li>


				</ul>


			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>



				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark"><?= $_SESSION["user_name"] ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">

								<a class="dropdown-item" href="authentification&status=signout">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<div class="content">
				<?= $content ?>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>Hassan Dashboard</strong></a> &copy;
							</p>
						</div>

					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="public/js/app.js"></script>



</body>

</html>