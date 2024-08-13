
<?php
session_start();
if(@!$_SESSION['email']){
	header("location:login.html");
}
$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];
$id_usuario = $_SESSION['id_usuario'];
?>

<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>GIMNASIO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
										<h2 style="color: black"><?php echo 'Bienvenid@', $nombre, 'a', 'GYMaster'?></h2>
									<ul class="icons">
										<button><a type="button" href="desconectar.php">Cerrar sesión</a></button>
										
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
												<h2 style="color: black">Registrarse</h2>

													<form method="post" action="subirdoc.php" enctype="multipart/form-data" class="form-control">
														<div class="row gtr-uniform">
															<div class="col-6 col-12-xsmall">
															    <?php
												if($rol=='administrador'){
													?>
																<select name="id_usuario">
                <option value="">Seleccione un usuario</option>
				<?php
		require("conexion.php");
		$sql = $mysqli->query("SELECT * FROM  usuarios");
  while ($datos=mysqli_fetch_array($sql)) {
 ?>
 <option value="<?php echo $datos[0] ?>"><?php echo $datos[1] ?></option>
<?php


}

?>
  <?php } ?>
	</select><p>	
	  <?php
												if($rol=='cliente'){
													?>
																<select name="id_usuario">
                <option value="">Seleccione  usuario</option>
				<?php
		require("conexion.php");
		$sql = $mysqli->query("SELECT * FROM  usuarios WHERE id_usuario='$id_usuario'");
  while ($datos=mysqli_fetch_array($sql)) {
 ?>
 <option value="<?php echo $datos[0] ?>"><?php echo $datos[1] ?></option>
<?php


}

?>
  <?php } ?>
	</select><p>	
																<input type="text" name="nombre_doc"  placeholder="Nombre del documento" />
															</div>
																<div class="col-6 col-12-xsmall">
																<input type="file" name="url_doc"   placeholder="URL" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="text" name="comentarios"  placeholder="Comentarios" />
															</div>
															<div class="col-6 col-12-xsmall">
																<select name="status">
                <option value="">Seleccione status</option>
			  <option value="">activo</option>
			    <option value="">inactivo</option>
	</select><p>	
																
															</div>
															
														

															<div class="col-12">
																
															</div>
															<!-- Break -->
															<div class="col-12">
																<ul class="actions">
																	  <input type="submit"></button> 
																</ul>
															</div>
														</div>
													</form></p>

									</div>
									<span class="image object">
										<img src="gym.jpeg" alt="" />
									</span>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Erat lacinia</h2>
									</header>
									<div class="features">
										<article>
											<span class="icon">

												<i class="fa fa-dumbbell fa-4x" style="color:black"></i>
											</span>
											<div class="content">
												<h3>Portitor ullamcorper</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										<article>
											<span class="icon">
												
												<i class="fa fa-weight-hanging fa-4x" style="color:black"></i>
											</span>
											<div class="content">
												<h3>Sapien veroeros</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
										
										
									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Ipsum sed dolor</h2>
									</header>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="y.jpeg" alt="" /></a>
											<h3>Interdum aenean</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
											
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="m.jpeg" alt="" /></a>
											<h3>Nulla amet dolore</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="fit.jpeg" alt="" /></a>
											<h3>Tempus ullamcorper</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="gym.jpeg" alt="" /></a>
											<h3>Sed etiam facilis</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="gimnasio.jpg" alt="" /></a>
											<h3>Feugiat lorem aenean</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">

											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="gym.jpeg" alt="" /></a>
											<h3>Amet varius aliquam</h3>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											<ul class="actions">
												
											</ul>
										</article>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										
									</header>
							<h2 style="color: black; font-style: italic;">Menú</h2>

									</header>
									<ul>

										<li>
											<span class="opener">Usuarios</span>
											<ul>
													<?php
												if($rol=='administrador'){
													?>
												
												<li><a href="index2.php">Alta</a></li> 
												<?php
												}
												?>

												<li><a href="consultar.php">Consulta</a></li>
												
											</ul>
										</li>

										<li>
											<span class="opener">Documentos</span>
											<ul>
												<li><a href="index3.php">Alta</a></li>
												<li><a href="index4.php">Documentos</a></li>
												
											</ul>
										</li>
										
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="fit.jpeg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="fitness.jpeg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="g.jpeg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
										<li class="icon solid fa-phone">(000) 000-0000</li>
										<li class="icon solid fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. GYMaster: <a href="">gimnasio</a>. Design: <a href="">GYMaster</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>