<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacto";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellido_paterno'];
$apellidoMaterno = $_POST['apellido_materno'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, edad, email, mensaje) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', $edad, '$email', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

