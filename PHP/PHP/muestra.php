<HTML>

<head>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <title>MOVIMIENTOS POKEDEX</title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>

<BODY>
<a href="#bottom" id="scrollToBottomBtn" class="scrollBtn2">↓</a>
<a id="top"></a>
<a href="index.php"  class="vuelta">INDEX</a></br>
<?php
include "database_Access.php";
// echo "llega";
// Consulta para obtener los datos de la tabla
$sql = "SELECT * FROM pokemon";

$resultado = mysqli_query($mysqli, $sql);

if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>numero_pokedex</th><th>nombre</th><th>peso</th><th>altura</th></tr>";
    
    while ($fila = $resultado->fetch_assoc()) {
        $numero_pokedex = $fila['numero_pokedex'];
    if ($numero_pokedex < 10)
        $imagen = "src=https://assets.pokemon.com/assets/cms2/img/pokedex/full/00" . $numero_pokedex . ".png";
    else if ($numero_pokedex < 100)
        $imagen = "src=https://assets.pokemon.com/assets/cms2/img/pokedex/full/0" . $numero_pokedex . ".png";
    else
        $imagen = "src=https://assets.pokemon.com/assets/cms2/img/pokedex/full/" . $numero_pokedex . ".png";

    // echo "<div class='nombre'><h1>#" . $numero_pokedex . " " . $nombre . "</h1></div>";
    // echo "<div class='pokemon'><img " . $imagen . "></div>";
        echo "<tr>";
        echo "<td>" . $numero_pokedex . "<div class='pokemon'><img " . $imagen . " width=100 height=100></div>" . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['peso'] . "</td>";
        echo "<td>" . $fila['altura'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron registros.";
}

?>
    <?php
        include "cerrarDatabase.php";
    ?>
    <a href="#top" id="scrollToTopBtn" class="scrollBtn">↑</a>
    <a id="bottom"></a>
</BODY>

</HTML>