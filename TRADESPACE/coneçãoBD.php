<?php
$host = "localhost";
$username = "root";
$password = "1234";
$database = "tradespace";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " .  $conn->connect_error);
}else {
    echo "Conectado com sucesso!";
}
$conn->close();
?>

