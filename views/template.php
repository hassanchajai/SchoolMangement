<!doctype html>
<html lang="en">

<head>
	<title>HsnDev</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/style.css">
</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="p-4 pt-5">
				<a href="dashboard" class="img logo rounded-circle mb-5" style="background-image: url(public/images/logo.webp);"></a>
				<ul class="list-unstyled  mb-5">
					<?php if ($_SESSION["role"] == "admin") : ?>
						<li class=" <?php echo $_GET["url"] == "dashboard" ? "active" : "" ?>">
							<a class="" href="dashboard">
								<i class="" data-feather="sliders"></i> <span class="">Dashboard</span>
							</a>
						</li>
						<li class=" <?php echo strtolower($_GET["url"]) == "salle" ? "active" : "" ?>">
							<a class="" href="Salle">
								<i class="" ></i> <span class="">Salle</span>
							</a>
						</li>

						<li class=" <?php echo strtolower($_GET["url"]) == "group" ? "active" : "" ?>">
							<a class="" href="group">
								<i class="" ></i> <span class="">Group</span>
							</a>
						</li>
						<li class=" <?php echo strtolower($_GET["url"]) == "ens" ? "active" : "" ?>">
							<a class="" href="ens">
								<i class="" ></i> <span class="">Ens</span>
							</a>
						</li>
					<?php else : ?>
						<li class=" <?php echo strtolower($_GET["url"]) == "cours" ? "active" : "" ?>">
							<a class="" href="cours">
								<i class="" ></i> <span class="">Cours</span>
							</a>
						</li>
					<?php endif; ?>

				</ul>

				<div class="footer">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>

			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5">

			<nav class="card mb-4">
				<div class="card-body d-flex justify-content-between p-3">
					<button type="button" id="sidebarCollapse" class="btn btn-primary ">
						<i class="fa fa-bars"></i>
						<span class="sr-only">Toggle Menu</span>
					</button>




			</nav>

			<div class="container-fluid">
				<?= $content ?>
			</div>

		</div>

		<script src="public/js/jquery.min.js"></script>
		<script src="public/js/popper.js"></script>
		<script src="public/js/bootstrap.min.js"></script>
		<script src="public/js/main.js"></script>
</body>

</html>