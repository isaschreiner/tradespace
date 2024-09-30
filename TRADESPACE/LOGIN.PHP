<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome_usuario = $_POST['user'];
        $senha = $_POST['senha'];

        echo" O usuario é:" . $nome_usuario;
        echo" A senha é:" . $senha;
   
   $sql = "SELECT* FROM LOGIN WHERE USUARIO = ?";
   $host = "localhost";
$username = "root";
$password = "1234";
$database = "tradespace";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " .  $conn->connect_error);
}
   
   if($stm = $conn->prepare ($sql)){
    $stm->bind_param("s", $nome_usuario);
   $stm->execute();
   
$resultado = $stm->get_result();

if ( $resultado->num_rows > 0) {
    $usuario= $resultado->fetch_assoc();

    if($usuario['Senha'] == $senha) {
        echo "Bem vindo !";
    }
        else {
echo "Login ou senha errados !";
        }
}
$stm->close();

} 
$conn -> close();
    }




?>