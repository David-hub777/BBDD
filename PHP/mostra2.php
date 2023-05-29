<HTML>

<head>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon">
    <title>MUESTRA POKEDEX</title>
    <!-- <link href="https://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
    <link rel="stylesheet" href="estilosAL.css" type="text/css"> -->
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>

<BODY>

<h1>MUESTRA POKEDEX</h1>
<?php
// Incluir el archivo de configuración y conexión a la base de datos
include "database_Access.php";
echo "llega";
// Consulta para obtener los datos de la tabla
$sql = "SELECT * FROM pokemon";

// Ejecutar la consulta
$resultado = mysqli_query($mysqli, $sql);

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla
    echo "<table>";
    echo "<tr><th>Columna 1</th><th>Columna 2</th><th>Columna 3</th><th>Columna 4</th></tr>";
    
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['columna2'] . "</td>";
        echo "<td>" . $fila['columna3'] . "</td>";
        echo "<td>" . $fila['columna4'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron registros.";
}

?>

    <h2>llega</h2>

    <!-- <table>
        <form id="editar_pokemon" name="editar_pokemon" method="get" action="EditarPokemon.php">
            <th colspan=10 style="text-align:center"># <?php echo $numero_pokedex ?></th>

            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>"></td>
                <td>Peso</td>
                <td><input type="number" name="peso" id="peso" step="0.1" value="<?php echo $peso ?>"></td>
                <td>Altura</td>
                <td><input type="number" name="altura" id="altura" value="<?php echo $altura ?>"></td>
            </tr>
            <tfoot>
                <tr>
                <tr>
                    <td></td>
                    <td>
                        <img src="./imagenes/tumba.png" class='edicion' <?php echo "onclick=eliminar(" . $numero_pokedex . ")" ?>>
                    </td>
                    <td>
                        <img src="./imagenes/edit.png" class='edicion' onclick="editar_pokemon.submit()">
                    </td>
                </tr>
            </tfoot>
        </form>
    </table> -->
    <?php
        include "cerrarDatabase.php";
    ?>
</BODY>

</HTML>