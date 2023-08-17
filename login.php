<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$login_usuario = $_POST['login_usuario'];
$login_contrasena = $_POST['login_contrasena'];

$sql = "SELECT * FROM usuarios_login WHERE usuario='$login_usuario' AND contrasena='$login_contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso, ahora mostrar la tabla de datos de la base de datos 'contacto'
    $contacto_dbname = "contacto";
    
    $contacto_conn = new mysqli($servername, $username, $password, $contacto_dbname);
    if ($contacto_conn->connect_error) {
        die("Conexión fallida: " . $contacto_conn->connect_error);
    }

    $contacto_sql = "SELECT * FROM usuarios";
    $contacto_result = $contacto_conn->query($contacto_sql);

    if ($contacto_result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Edad</th><th>Email</th><th>Mensaje</th><th>Fecha de Registro</th></tr>";
        while ($row = $contacto_result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['apellido_paterno']}</td><td>{$row['apellido_materno']}</td><td>{$row['edad']}</td><td>{$row['email']}</td><td>{$row['mensaje']}</td><td>{$row['fecha_registro']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron registros en la tabla 'usuarios' de la base de datos 'contacto'.";
    }

    $contacto_conn->close();
} else {
    echo "Inicio de sesión fallido. Usuario o contraseña incorrectos.";
}

$conn->close();
?>
