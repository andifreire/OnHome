<?php
	
	session_start();

	if(!isset($_SESSION['logueado'])) {
		header("Location: login.php");
		exit;
	}



	$cn = mysqli_connect("localhost", "root", "", "empresa");



	
$consulta=mysqli_query($conexion, "SELECT nombre, apellido, email FROM usuarios WHERE usuario='$usuario' AND password='$password'");

$resultado=mysqli_num_rows($consulta);

	$_SESSION['nombre']=$respuesta['nombre'];
	$_SESSION['apellido']=$respuesta['apellido'];
		


?>
<!DOCTYPE html>
<html>
<head>
	<title>Listado de Empleados</title>

	<style>
		table th, table td {
			border: 1px solid black;
		}
	</style>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Brown Owl</title>
  <link rel="stylesheet" href="styles/style.processed.css?v2">


</head>
<body>

	






  <header class="site-header">
    <nav>
      <div class="max"> <a class="logo" href="/">
          <svg viewBox="0 0 512 512" width="100" title="Logo">
            <path d="M502.05 57.6C523.3 36.34 508.25 0 478.2 0H33.8C3.75 0-11.3 36.34 9.95 57.6L224 271.64V464h-56c-22.09 0-40 17.91-40 40 0 4.42 3.58 8 8 8h240c4.42 0 8-3.58 8-8 0-22.09-17.91-40-40-40h-56V271.64L502.05 57.6z"></path>
           </svg>The Brown Owl</a><a href="about.html">About</a><a href="contact.html">Contact</a></div>
    </nav>
    <div>
      <div class="center">
        <h1>Cocktails for Breakfast</h1>
        <div>We do burgers for lunch, too.</div>
      </div>
      <p>Hola <?= $_SESSION['nombre'] ?></p>

	<form action="buscador.php" method="get">
		<label for="nombre">Buscar:</label>
		<input type="text" name="nombre" id="nombre" maxlength="20" />
		<input type="submit" value="Buscar" />
	</form>


	<h1>Listado de Empleados</h1>

	<table>
		<tr>
			<th>Empleado</th>
			<th>Cargo</th>
			<th>Monto total</th>
			<th>Fecha</th>
		</tr>

		<?php while($fila = mysqli_fetch_assoc($empleados)) { ?>
			<tr>
				<td><a href="lista_ad.php?e=<?=$fila['empleado_id']?>"><?=$fila['nombre']?></a></td>
				<td><?=$fila['descripcion']?></td>
				<td><?=$fila['monto']?></td>
				<td><?=$fila['fecha']?></td>
			</tr>
		<?php } ?>
	</table>

    </div>
  </header>
  <main class="site-content max">
    <div class="grid">
      <div>
        <h2>Templating in Pug</h2>
        <p>Templating in Pug is pretty nice. Not only do you get the ability to do <code>include</code> but you also get <code>extend</code>, which means you can make sorta weave together blocks of content into templates.</p>
      </div>
      <div>
        <h2>Images & Icons</h2>
        <p>This template makes use of images from Unsplash and the logo is an icon from FontAwesome, but used as SVG.</p>
      </div>
    </div>
  </main>
  <footer class="site-footer">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45870.06764743621!2d-121.34979530505584!3d44.065202435615454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbf274852fa7f978!2sThe%20Brown%20Owl!5e0!3m2!1sen!2sus!4v1604961722855!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="max"> 
    		<br/><br/>
	<a href="logout.php">Cerrar sesión</a>
      <div class="grid">
        <div>
          <h2>Visit Us</h2>
          <dl>
            <dt>550 Industrial Way</dt>
            <dt>Bend, Oregon</dt>
          </dl>
        </div>
        <div>
          <h2>Reservations</h2>
          <dt>
            <dt>1 (234) 567 8900</dt>
            <dt>contact@example.com</dt>
          </dt>
        </div>
        <div>
          <h2>Hours</h2>
          <dl>
            <dt>Monday - Friday: 9am - 10pm</dt>
            <dt>Saturday & Sunday: 11am - 11pm</dt>
          </dl>
        </div>
      </div>
      <div class="flex-jc-sb flex">
        <div class="footer-left">&copy;2021 Our Website</div>
        <div class="footer-right"> <a href="https://facebook.com">Facebook </a><a href="https://twitter.com">Twitter </a></div>
      </div>
    </div>
  </footer>
</body>

</html>