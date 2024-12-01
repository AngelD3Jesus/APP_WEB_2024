<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <style>
        .categoria {
            border-bottom: 1px solid #ccc;
            padding: 15px 10px;
            margin-bottom: 10px;
        }
        .categoria h2 {
            margin: 0 0 10px;
            font-size: 1.2em;
        }
        .categoria p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="mostrar_articulos.php">Artículos</a></li>
            <li><a href="mostrar_categorias.php">Categorías</a></li>
            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Mostrar Categorías</h1>
            <?php
            include_once('conexion.php');

            // Consulta SQL para obtener las categorías con su descripción larga
            $sql = "SELECT descripcion, descripcion_larga FROM categorias";
            $ejecucion_sql = $conexion->query($sql);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<div class="categoria">';
                    echo '<h2>' . htmlspecialchars($fila['descripcion']) . '</h2>';
                    echo '<p>' . htmlspecialchars($fila['descripcion_larga']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay categorías disponibles.</p>';
            }
            ?>
            <hr>
       </div>
    </section>
    <footer>
        <p>Curso de PHP con Angel de Jesus Avitia &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>
