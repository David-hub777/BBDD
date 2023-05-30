<HTML>

<head>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <title>ORDER POKEDEX</title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>

<BODY>
<a href="index.php"  class="vuelta">INDEX</a></br>
<a href="movimientos.php"  class="vuelta2">VOLVER</a></br>
<a href="#bottom" id="scrollToBottomBtn" class="scrollBtn2">↓</a>
<a id="top"></a>
<?php
include "database_Access.php";
$nombrePokemon = $_GET['nombrePokemon'];
$columna = isset($_GET['columna']) ? $_GET['columna'] : ''; // Obtener el parámetro "columna" de la URL
$orden = isset($_GET['orden']) && $_GET['orden'] === 'desc' ? 'asc' : 'desc'; 

if (!empty($columna)) {
  $sql = "SELECT DISTINCT p.nombre, p.numero_pokedex, m.nombre as nombreMovimiento, m.potencia, m.pp, t.nombre as tipo
          FROM pokemon p
          INNER JOIN pokemon_movimiento_forma pmf ON p.numero_pokedex = pmf.numero_pokedex
          INNER JOIN movimiento m ON pmf.id_movimiento = m.id_movimiento
          INNER JOIN tipo t ON m.id_tipo = t.id_tipo
          WHERE p.nombre = '" . $nombrePokemon . "'
          ORDER BY ".$columna." " . $orden . "";
          // ORDER BY $columna $orden";
  $resultado = mysqli_query($mysqli, $sql);
} else {
  $sql = "SELECT DISTINCT p.nombre, p.numero_pokedex, m.nombre as nombreMovimiento, m.potencia, m.pp, t.nombre as tipo
          FROM pokemon p
          INNER JOIN pokemon_movimiento_forma pmf ON p.numero_pokedex = pmf.numero_pokedex
          INNER JOIN movimiento m ON pmf.id_movimiento = m.id_movimiento
          INNER JOIN tipo t ON m.id_tipo = t.id_tipo
          WHERE p.nombre = '" . $nombrePokemon . "'";
  $resultado = mysqli_query($mysqli, $sql);
}
function cambiarOrden($orden) {
    ($orden === 'asc' ? 'desc' : 'asc');
  }
if ($resultado->num_rows > 0) {
  echo "aaaaaaaaaaaaaaaaaaaaaaa".($orden);
  echo "<table>";
  echo "<tr><th><a href='?columna=numero_pokedex&nombrePokemon=".$nombrePokemon."&orden=" .($orden) . "'>pokedex</a></th>
            <th><a href='?columna=nombre&nombrePokemon=".$nombrePokemon."&orden=" . ($orden) . "'>nombre</a></th>
            <th><a href='?columna=nombreMovimiento&nombrePokemon=".$nombrePokemon."&orden=" . ($orden) . "'>nombreMovimiento</a></th>
            <th><a href='?columna=potencia&nombrePokemon=".$nombrePokemon."&orden=" . ($orden) . "'>potencia</a></th>
            <th><a href='?columna=pp&nombrePokemon=".$nombrePokemon."&orden=" . ($orden) . "'>pp</a></th>
            <th><a href='?columna=tipo&nombrePokemon=".$nombrePokemon."&orden=" . ($orden) . "'>tipo</a></th></tr>";

            while ($fila = $resultado->fetch_assoc()) {
              $numero_pokedex = $fila['numero_pokedex'];
          if ($numero_pokedex < 10)
              $imagen = "src=https://assets.pokemon.com/assets/cms2/img/pokedex/full/00" . $numero_pokedex . ".png";
          else if ($numero_pokedex < 100)
              $imagen = "src=https://assets.pokemon.com/assets/cms2/img/pokedex/full/0" . $numero_pokedex . ".png";
          else
              $imagen = "src=https://assets.pokemon.com/assets/cms2/img/pokedex/full/" . $numero_pokedex . ".png";
      
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
