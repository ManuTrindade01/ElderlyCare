<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link href="assets/css/login.css" rel="stylesheet">

    <?php
				session_start();
				include("conexao.php"); //roda todo o código da página conexao.php 
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					//require ("conexao.php");
					$email = $_POST['email'];//dados do formulário, no input name="email"
					$senha = $_POST['senha'];

					$sql = "SELECT * FROM usuarios WHERE email='$email' && senha='$senha'";

					$resultado = mysqli_query($conn, $sql);
					//print_r($resultado); imprime quantidade de linha da seleção
					$row = $resultado->fetch_assoc();

					if (mysqli_num_rows($resultado) > 0) {
						$_SESSION['email'] = $email;
						$_SESSION['nome'] = $row['nome'];
						header("location: adm.php");
					} else {
						unset($_SESSION['email']);
						echo "usuário ou senha inválida";
						header("refresh:2, url=login.php");
					}

				}
				?>

</head>
<body>
    
<form method="POST">
    <div>
        <h1>Login</h1>
        <img src="Dementia-pana.png" alt="" width="150px">
        <input type="email" placeholder="E-mail" id="email" name="email">
        <input type="password" placeholder="Senha" id="senha" name="senha">
        <button type="submit">Enviar</button>
		<a href="cadastrousuario.php" style="color: white;">Não tem cadastro?Cadastre-se</a>
    </div>
    </form>
</body>
</html>
