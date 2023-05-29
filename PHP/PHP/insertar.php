<HTML>

<head>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <title>ORDER POKEDEX</title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>

<BODY>
<a href="index.php"  class="vuelta">INDEX</a></br>
<a href="#bottom" id="scrollToBottomBtn" class="scrollBtn2">↓</a>
<a id="top"></a>

<center><form action="insertar.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="peso">Peso:</label>
    <input type="number" name="peso" id="peso" required>

    <label for="altura">Altura:</label>
    <input type="number" name="altura" id="altura" required>
    <br><br>
    <input type="submit" value="Enviar">
</form></center>
<?php
    include "database_Access.php";
    if (isset($_POST['nombre']) && isset($_POST['peso']) && isset($_POST['altura'])) {
        $nombre = $_POST['nombre'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $sql = 'Insert into pokemon(nombre,altura,peso) values("'.$nombre.'",'.$altura.','.$peso.' )';
    }else       
        $sql = 'Insert into pokemon(nombre,altura,peso) values("null","null","null")';
    // echo $sql;
    mysqli_query($mysqli, $sql);







    include "cerrarDatabase.php";
?>
<a href="#top" id="scrollToTopBtn" class="scrollBtn">↑</a>
    <a id="bottom"></a>
</BODY>

</HTML>