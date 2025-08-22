<?php
include('conexao.php');

$mensagem = "";
$mensagemTipo = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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



        $sql = "INSERT INTO idoso (statusidoso, nomeCompleto, CPF, dataNascimento, CEP, cidade, UF, bairro, rua, numero, complemento, limitacoesFisicas, descricao)
                VALUES ('$statusidoso', '$nomeCompleto', '$CPF', '$dataNascimento', '$CEP', '$cidade', '$UF', '$bairro', '$rua', '$numero', '$complemento', '$limitacoesFisicas', '$descricao')";

        if (mysqli_query($conn, $sql)) {
            $mensagem = "Idoso cadastrado com sucesso!";
            $mensagemTipo = "sucesso";
            header("refresh:2;url=index.php");
        } else {
            $mensagem = "Erro ao cadastrar: " . mysqli_error($conn);
            $mensagemTipo = "erro";
        }

    mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="assets/css/cadastro.css">
</head>
<body>
<div class="container">
        <h2>Cadastro de Idoso</h2>
        <form action="" method="post">
            <label for="statusidoso">Status do Idoso</label>
            <div class="radio-group">
    <input type="radio" id="ativo" name="statusidoso" value="1">
    <label for="ativo">Ativo</label>

    <input type="radio" id="inativo" name="statusidoso" value="2">
    <label for="inativo">Inativo</label>
</div>

            <label for="nomeCompleto">Nome Completo</label>
            <input type="text" name="nomeCompleto" required>

            <label for="CPF">CPF</label>
            <input type="text" name="CPF" required>

            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento" required>

            <label for="CEP">CEP</label>
            <input type="text" name="CEP" required>

            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" required>

            <label for="UF">UF</label>
            <input type="text" name="UF" required>

            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" required>

            <label for="rua">Rua</label>
            <input type="text" name="rua" required>

            <label for="numero">Número</label>
            <input type="text" name="numero" required>

            <label for="complemento">Complemento</label>
            <input type="text" name="complemento">

            <label for="limitacoesFisicas">Limitações Físicas</label>
            <input type="text" name="limitacoesFisicas">

            <label for="descricao">Descrição</label>
            <input type="text" name="descricao">

            <button type="submit" class="cadastrar">Cadastrar</button>
        </form>

        <?php if (!empty($mensagem)): ?>
            <div class="mensagem <?= $mensagemTipo ?>">
                <?= htmlspecialchars($mensagem) ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>