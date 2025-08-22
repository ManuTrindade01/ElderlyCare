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
	<title>Alterar Idoso</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/cadastro.css">
</head>

<body>
	<div class="container">
		
		<label for="statusidoso">Status do Idoso</label>
            <div class="radio-group">
    <input type="radio" id="ativo" name="statusidoso" value="1" required value="<?php echo $linha['statusidoso']; ?>">
    <label for="ativo">Ativo</label>

    <input type="radio" id="inativo" name="statusidoso" value="2" required value="<?php echo $linha['statusidoso']; ?>>
    <label for="inativo">Inativo</label>
</div>

            <label for="nomeCompleto">Nome Completo</label>
            <input type="text" name="nomeCompleto" required value="<?php echo $linha['nomeCompleto']; ?>">

            <label for="CPF">CPF</label>
            <input type="text" name="CPF" required value="<?php echo $linha['CPF']; ?>">

            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento" required value="<?php echo $linha['dataNascimento']; ?>">

            <label for="CEP">CEP</label>
            <input type="text" name="CEP" required value="<?php echo $linha['CEP']; ?>">

            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" required value="<?php echo $linha['cidade']; ?>">

            <label for="UF">UF</label>
            <input type="text" name="UF" required value="<?php echo $linha['UF']; ?>">

            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" required value="<?php echo $linha['bairro']; ?>">

            <label for="rua">Rua</label>
            <input type="text" name="rua" required value="<?php echo $linha['rua']; ?>">

            <label for="numero">Número</label>
            <input type="text" name="numero" required value="<?php echo $linha['numero']; ?>">

            <label for="complemento">Complemento</label>
            <input type="text" name="complemento" required value="<?php echo $linha['complemento']; ?>">

            <label for="limitacoesFisicas">Limitações Físicas</label>
            <input type="text" name="limitacoesFisicas" required value="<?php echo $linha['limitacoesFisicas']; ?>">

            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" required value="<?php echo $linha['descricao']; ?>">

            <button type="submit" class="cadastrar">Salvar</button>
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