<!DOCTYPE html>
<html lang="es">
<head>
||<link rel="stylesheet" href="styles.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    nav {
			background-color: black;
			overflow: hidden;
			display: flex;
			justify-content: center;
		}

		nav a {
			float: left;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 1.5em;
		}

		nav a:hover {
			background-color: #ddd;
			color: black;
		}


		@media only screen and (max-width: 600px) {
			nav a {
				font-size: 1em;
				padding: 10px;
			}
		}
  .btn {
    background-color: green;
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
    display: block;
    margin: 0 auto;
    text-align: center;
  }
	</style>
</head>
<body>
<nav>
		<a class="active" href="index.html">Inicio</a>
		<a href="formulario.html">Registro de Propietario</a>
		<a href="buscarTumba.html">Buscar Tumba</a>
	</nav>
    <div class="banner">
        <img src="img/banner.jpeg" alt="Banner">
        <div class="banner-text">
            <h1>Bienvenido al panteón Soledad</h1>
        </div>
    </div>

    <div class="cuadro">
        <div class="texto">
          <h2 style="text-align: center;">Panteon Soledad</h2>
          <p style="text-align: justify;"></>
            <div class="cuadro">
                <div class="texto">
                </div>
                <div class="imagen">
                  <img src="img/texto.jpg" alt="Descripción de la imagen">
                </div>
              </div>
              
        </div>
      </div>
<?php
// Establecer la conexión con la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bdcementerio";
$port = "6666";

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}


$nombre = $_POST["nombre"];
$curp = $_POST["curp"];
$fecha = $_POST["fecha"];
$lugar = $_POST["lugar"];
$calle = $_POST["calle"];
$num_interior = $_POST["num_interior"];
$num_exterior = $_POST["num_exterior"];
$colonia = $_POST["colonia"];
$municipio = $_POST["municipio"];
$estado = $_POST["estado"];
$codigo_postal = $_POST["codigo_postal"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];

$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$longitud = 10;
$clave = '';
for ($i = 0; $i < $longitud; $i++) {
  $clave .= $caracteres[rand(0, strlen($caracteres) - 1)];
}


$sql = "INSERT INTO registroWeb (Nombre, CURP, FechaNacimiento, LugarNacimiento, Calle, NumeroInterior, NumeroExterior, Colonia, Municipio, Estado, CodigoPostal, CorreoElectronico, Telefono,Clave) 
        VALUES ('$nombre', '$curp', '$fecha', '$lugar', '$calle', '$num_interior', '$num_exterior', '$colonia', '$municipio', '$estado', '$codigo_postal', '$email', '$telefono','$clave')";

if (mysqli_query($conn, $sql)) {
  echo('<div style="background-color: #f2f2f2; padding: 10px;">');
  echo ('<h1 style="text-align: center;">Preregistro Completado, visite las oficinas del cementerio y entregue esta clave:'.$clave. '</h1>');
  echo ('</div>');
}else{
  echo('<div style="background-color: #f2f2f2; padding: 10px;">');
  echo ('<h1 style="text-align: center;"> No se pudo intente de nuevo o visite nuestras instalaciones</h1>');
  echo ('</div>');
}
?>
  <div>
    <button class="btn" onclick="window.location.href='formulario.html'">Volver a registrar</button>
  </div>
</body>
<footer>
    <div class="container">
      <div class="contact-info">
        <h3>Contacto</h3>
        <p><i class="fas fa-map-marker-alt"></i> Dirección: 365 Calle Constitución, Autlán de Navarro, Jalisco, 48900</p>
        <p><i class="fas fa-envelope"></i> Correo electrónico: gobautlan@gmail.com</p>
        <p><i class="fas fa-phone-alt"></i> Teléfono: 317 381 1116</p>
      </div>
      <div class="social-media">
        <h3>Redes Sociales</h3>
        <ul>
          <li><a href="https://www.facebook.com/pages/Panteon-La-Soledad-Autlan/202676689940396"><img src="img/facebook.png" alt="Facebook"></a></li>
          <li><a href="https://www.twitter.com/"><img src="img/twitwr.png" alt="Twitter"></a></li>
          <li><a href="https://www.instagram.com/"><img src="img/instagram.png" alt="Instagram"></a></li>
        </ul>
      </div>
    </div>
  </footer>
</html>
