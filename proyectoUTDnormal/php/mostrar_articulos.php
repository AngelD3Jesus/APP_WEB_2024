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
        .articulo {
            border-bottom: 1px solid #ccc;
            padding: 15px 10px;
            margin-bottom: 10px;
        }
        .articulo h2 {
            margin: 0 0 10px;
            font-size: 1.2em;
        }
        .articulo p {
            margin: 5px 0;
        }
        .articulo img {
            max-width: 200px;
            display: block;
            margin-bottom: 10px;
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
            <h1>Mostrar Artículos</h1>
            <?php
            include_once('conexion.php');

            // Consulta SQL para obtener los artículos con sus nombres e imágenes
            $sql = "SELECT 
                        articulos.nombre AS nombre_articulo, 
                        articulos.descripcion AS articulo, 
                        articulos.pu, 
                        articulos.cantidad, 
                        articulos.imagen, 
                        categorias.descripcion AS categoria 
                    FROM articulos 
                    INNER JOIN categorias 
                    ON articulos.id_categoria = categorias.id";

            $ejecucion_sql = $conexion->query($sql);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<div class="articulo">';
                    echo '<h2>' . htmlspecialchars($fila['nombre_articulo']) . '</h2>';

                    // Mostrar la imagen si está definida
                    if (!empty($fila['imagen']) && file_exists("../img/" . $fila['imagen'])) {
                        echo '<img src="../img/' . htmlspecialchars($fila['imagen']) . '" alt="' . htmlspecialchars($fila['nombre_articulo']) . '">';
                    } else {
                        echo '<img src="../img/articulos/default.webp" alt="Imagen por defecto">';
                    }

                    echo '<p><strong>Descripción:</strong> ' . htmlspecialchars($fila['articulo']) . '</p>';
                    echo '<p><strong>Precio Unitario:</strong> $' . htmlspecialchars($fila['pu']) . '</p>';
                    echo '<p><strong>Cantidad:</strong> ' . htmlspecialchars($fila['cantidad']) . '</p>';
                    echo '<p><strong>Categoría:</strong> ' . htmlspecialchars($fila['categoria']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay artículos disponibles.</p>';
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
