<html>

<head>
    <link rel="stylesheet" href="pagesIndex.css" type="text/css">
	<link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <title>Guia de la WEB</title>
</head>

<body>
    <h1>Estos son los archivos de la carpeta HTML</h1>
    <center>
    <?php
    echo "<table>";
    $path = ".";
    $dh = opendir($path);
    $i = 1;
    while (($file = readdir($dh)) !== false) {
        if ($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
            echo "<tr><td><a href='$path/$file'>$file</a><td></tr>";
            $i++;
        }
    }
    closedir($dh);
    echo "</table>";
    ?>
    </center>
</body>

</html>