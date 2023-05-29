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
<center>
<h1>MUESTRA POKEDEX</h1>
<div>Consultar por pokemon</div>
<form action="movimientosGet.php" method="get"><br>
Pokemon: <input type="text" name="tipo1" size="20"><br><br>
<!-- Tipo2: <input type="text" name="tipo2" size="20"><br> -->
<input type="submit" value="enviar tipos"/>
</form>
</center>
<?php
// Incluir el archivo de configuración y conexión a la base de datos
include "database_Access.php";

$sql = "SELECT DISTINCT p.nombre , p.numero_pokedex  ,
                                        m.nombre as nombreMovimiento,
                                        m.potencia as potencia,
                                        m.pp as pp,
                                        t.nombre as tipo
                                        FROM pokemon p
                                        INNER JOIN pokemon_movimiento_forma pmf
                                        ON p.numero_pokedex = pmf.numero_pokedex
                                        INNER JOIN movimiento m
                                        ON pmf.id_movimiento = m.id_movimiento
                                        INNER JOIN tipo t on m.id_tipo = t.id_tipo
                                        ORDER BY p.numero_pokedex ";
                                        // WHERE p.nombre = " . $nombrePokemon;
                                        
$resultado = mysqli_query($mysqli, $sql);
// echo "llega";
if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr><th><a href='order.php?columna=numero_pokedex'>pokedex</a></th>
            <th><a href='order.php?columna=nombre'>nombre</a></th>
            <th><a href='order.php?columna=nombreMovimiento'>nombreMovimiento</a></th>
            <th><a href='order.php?columna=potencia'>potencia</a></th>
            <th><a href='order.php?columna=pp'>pp</a></th>
            <th><a href='order.php?columna=tipo'>tipo</a></th></tr>";
    
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
        echo "<td>" . $fila['nombreMovimiento'] . "</td>";
        echo "<td>" . $fila['potencia'] . "</td>";
        echo "<td>" . $fila['pp'] . "</td>";
        echo "<td>" . $fila['tipo'] . "</td>";
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