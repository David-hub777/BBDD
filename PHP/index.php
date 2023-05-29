<html>
<head>
    <link rel="stylesheet" href="pagesIndex.css" type="text/css">
	<link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <title>Guia de la WEB</title>
</head>

<body>
    <h1>Estos son los archivos de la carpeta HTML</h1>
	<center><ul>
		<?php
			$directorio = './'; // Ruta del directorio actual
			// Obtener la lista de archivos en el directorio
			$archivos = scandir($directorio);
			// Mostrar los archivos en una lista ordenada
			foreach ($archivos as $archivo) {
				if ($archivo !== '.' && $archivo !== '..') {
					echo "<li><a href='$directorio$archivo'>  $archivo</a></li>";
				}
			}
		?>
	</ul></center>
</body>
</html>