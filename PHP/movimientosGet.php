<HTML>

<head>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <title>MOVIMIENTOS POKEDEX</title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>

<BODY>
<a href="index.php"  class="vuelta">INDEX</a></br>
<a href="movimientos.php"  class="vuelta2">VOLVER</a></br>
<?php
//recuperamos los datos del formulario.php
//y los guardamos en variables
$nombrePokemon = $_GET['tipo1'];
// $tipo2 = $_GET['tipo2'];
//comprobamos si tipo 2 is set
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
                                        WHERE p.nombre = '" . $nombrePokemon . "'";
                                        // ;
// if(isset($tipo2)){
//   $sql = $sql." and tipo='".$tipo2."'";
// } 
// $sql = $sql.";";
// echo $sql;

?>
<?php
// Archivo de configuración 
include "database_Access.php";
// Ejecutar la consulta
$resultado = mysqli_query($mysqli, $sql);
// echo "llega";
if ($resultado->num_rows > 0) {
    echo "<table>";
    // echo "<tr><th>pokedex</th><th><a href='?columna=nombre'>nombre</a></th><th><a href='?columna=nombreMovimiento'>nombreMovimiento</a></th>
    //         <th><a href='?columna=potencia'>potencia</a></th><th><a href='?columna=pp'>pp</a></th>
    //         <th><a href='?columna=tipo'>tipo</a></th></tr>";
    echo "<tr><th colspan='2' ><a href='orderPokemon.php?columna=p.nombre&nombrePokemon=".$nombrePokemon."'>pokedex</a></th>
            <th><a href='orderPokemon.php?columna=m.nombre&nombrePokemon=".$nombrePokemon."'>nombreMovimiento</a></th>
            <th><a href='orderPokemon.php?columna=m.potencia&nombrePokemon=".$nombrePokemon."'>potencia</a></th>
            <th><a href='orderPokemon.php?columna=m.pp&nombrePokemon=".$nombrePokemon."'>pp</a></th>
            <th><a href='orderPokemon.php?columna=t.tipo&nombrePokemon=".$nombrePokemon."'>tipo</a></th></tr>";

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



</BODY>

</HTML>