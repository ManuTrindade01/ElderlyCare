<?php
$servidor = "localhost";
$usuarios = "root";
$senha = "";
$basededados = "bd";

$conn = mysqli_connect($servidor, $usuarios, $senha, $basededados);
if (!$conn){
    die("Falha na conexão: ");
}
//echo"Conexão realizada com sucesso!";
?>