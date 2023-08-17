<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$registro_usuario = $_POST['registro_usuario'];
$registro_contrasena = $_POST['registro_contrasena'];

$sql = "INSERT INTO usuarios_login (usuario, contrasena) VALUES ('$registro_usuario', '$registro_contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "Cuenta creada exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
