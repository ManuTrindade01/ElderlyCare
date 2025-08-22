<?php
session_start();
if (!isset($_SESSION['email'])) {
	header("location: login.php");
	exit;
}

include('conexao.php');

$mensagem = "";
$mensagemTipo = "";

// Pega o ID do usuário da URL
$id = intval($_GET['id']); // segurança básica

// Processa o formulário ANTES do HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$statusidoso = $_POST['statusidoso'];
    $nomeCompleto = $_POST['nomeCompleto'];
    $CPF = $_POST['CPF'];
    $dataNascimento = $_POST['dataNascimento'];
    $CEP = $_POST['CEP'];
    $cidade = $_POST['cidade'];
    $UF = $_POST ['UF'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $limitacoesFisicas = $_POST['limitacoesFisicas'];
    $descricao = $_POST['descricao'];

		$sql2 = "UPDATE idoso SET statusidoso='$statusidoso', nomeCompleto='$nomeCompleto', CPF='$CPF', dataNascimento='$dataNascimento', CEP='$CEP', cidade='$cidade', UF='$UF', bairro='$bairro', rua='$rua', numero='$numero', complemento='$complemento', limitacoesFisicas='$limitacoesFisicas', descricao='$descricao' WHERE ididoso='$ididoso'";
		if (mysqli_query($conn, $sql2)) {
			$mensagem = "Usuário alterado com sucesso!";
			$mensagemTipo = "sucesso";
		} else {
			$mensagem = "Erro ao atualizar idoso: " . mysqli_error($conn);
			$mensagemTipo = "erro";
		}
	}

// Pega os dados do usuário para preencher o formulário
$sql = "SELECT * FROM idoso WHERE ididoso='$ididoso'";
$resultado = mysqli_query($conn, $sql);
$linha = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Alterar Usuário</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/cadastro.css">
</head>

<body>
	<div class="container">
		<form method="POST" action="">
			<h2>Alterar Usuário</h2>

			<label for="nome">Nome:</label><br>
			<input type="text" name="nome" placeholder="Digite seu nome" required value="<?php echo $linha['nome']; ?>"><br>

			<label for="email">E-mail:</label><br>
			<input type="email" name="email" placeholder="Digite seu e-mail" required value="<?php echo $linha['email']; ?>"><br>

			<label for="senha">Senha:</label><br>
			<input type="password" name="senha" placeholder="Digite sua nova senha (opcional)"><br>

			<label for="senha2">Repita a Senha:</label><br>
			<input type="password" name="senha2" placeholder="Repita sua nova senha"><br>

			<input type="submit" class="cadastrar" value="Salvar">
		</form>

		<div class="mensagem <?php echo $mensagemTipo; ?>" id="mensagem-box">
			<?php echo $mensagem; ?>
		</div>
	</div>

	<script>
		// Exibe mensagem se existir
		const msgBox = document.getElementById('mensagem-box');
		if (msgBox.textContent.trim() !== '') {
			msgBox.style.display = 'block';
		}
	</script>
</body>

</html>