<?php
//session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Desactivar las noticias y mostrar los errores
    error_reporting(E_ALL ^ E_NOTICE);

    // 1.- Conectarse a la BD
    include_once("conexion.php");

    // 2.- Traer los datos del formulario
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $pass = $_POST['pass'];
    $confirmar_pass = $_POST['confirmar_pass'];

    // Validar que las contraseñas coincidan
    if ($pass !== $confirmar_pass) {
        echo "<script>alert('Las contraseñas no coinciden.');</script>";
    } else {
        // 3.- Insertar en la base de datos
        $sql = "INSERT INTO usuarios (username, password, email, nombre, apellido, privilegio) 
                VALUES ('$usuario', '$pass', '$email', '$nombre', '$apellido', 'cliente')";

        // 4.- Ejecutar la consulta
        $ejecutar_sql = $conexion->query($sql);

        if ($ejecutar_sql) {
            echo "<script>alert('Usuario agregado correctamente.'); window.location.href = 'inicio_sesion.php';</script>";
        } else {
            echo "<script>alert('No fue posible agregar al usuario, verifique por favor.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
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
            <li><a href="inicio_sesion.php">Iniciar sesión</a></li>
            <li><a href="registro.php">Registrarse</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Registrarse</h1>
            <hr>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table align="center">
                <tr>
                    <td><label for="us">Usuario:</label></td>
                    <td><input type="text" name="usuario" id="us" autofocus required></td>
                </tr>
                <tr>
                    <td><label for="em">Correo Electrónico:</label></td>
                    <td><input type="email" name="email" id="em" required></td>
                </tr>
                <tr>
                    <td><label for="nm">Nombre:</label></td>
                    <td><input type="text" name="nombre" id="nm" required></td>
                </tr>
                <tr>
                    <td><label for="ap">Apellido:</label></td>
                    <td><input type="text" name="apellido" id="ap" required></td>
                </tr>
                <tr>
                    <td><label for="ps">Contraseña:</label></td>
                    <td><input type="password" name="pass" id="ps" required></td>
                </tr>
                <tr>
                    <td><label for="cp">Confirmar Contraseña:</label></td>
                    <td><input type="password" name="confirmar_pass" id="cp" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Registrar" name="registrar"></td>
                    <td><input type="reset" value="Borrar" name="borrar"></td>
                </tr>
            </table>
            </form>
       </div>
    </section>
    <footer>
        <p>Curso de PHP con Angel de Jesus Avitia &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>
