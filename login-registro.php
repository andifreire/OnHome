<?php

	session_start();
	$cn = mysqli_connect("localhost", "root", "", "empresa");


	if(count($_POST) > 0) {

		$email = $_POST['email'];
		$passwd = $_POST['passwd'];

		$res = mysqli_query($cn, "SELECT *
									FROM usuarios
									WHERE email='$email' and contraseña='$passwd' 
									LIMIT 1");
		
		
		if(mysqli_num_rows($res) == 1) {
			$_SESSION['logueado'] = true;
			$fila = mysqli_fetch_assoc($res);
			$_SESSION['nombre'] = $fila['nombre'];
			header("Location: listado.php");
			exit;
		}

		if(mysqli_num_rows($res) == 0) {
			echo "no iniciaste sesioususario no encontrado";
		}

	}

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	
	<style> 
		#lista{
			text-align: center;
			opacity:  0.5 ;
			font-size: 16pt;
			scroll-behavior: smooth;
			display: block;

		}


	 </style>
</head>
<body>

	<form action="" method="post">
		<input type="text" name="email" /> <br/>
		<input type="password" name="passwd" /> <br/>

		<br/>
		<input type="submit" value="Iniciar sesión" />
	</form>
	<input type="button" value="registrate" id="registro" onclick="mostrar_registro()"/>
	<br/>


</script>
</body>
</html>