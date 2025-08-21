<?php
include('conexao.php');

$mensagem = "";
$mensagemTipo = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $nomeCompleto = $_POST['nomeCompleto'];
    $CPF = $_POST['CPF'];
    $dataNascimento = $_POST['dataNascimento'];
    $CEP = $_POST['CEP'];
    $cidade = $_POST['cidade'];
    $UF = $_POST['UF'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $certificado = $_POST['certificado'];
    $descricao = $_POST['descricao'];
    $horarioInicialDisp = $_POST['horarioInicialDisp'];
    $horarioFinalDisp = $_POST['horarioFinalDisp'];
    $foto = $_POST['foto'];
    $antecedentesCriminais = $_['antecedentesCriminais'];
    $declaracaoVacina = $_POST['declaracaoVacina'];


        $sql = "INSERT INTO cuidador (status, nomeCompleto, CPF, dataNascimento, CEP, cidade, UF, bairro, rua, numero, complemento, certificado, descricao, horarioInicialDisp, horarioFinalDisp, foto, antecedentesCriminais, declaracaoVacina)
                VALUES ('$status', '$nomeCompleto', '$CPF', '$dataNascimento', '$CEP', '$cidade', '$UF', '$bairro', '$rua', '$numero', '$complemento', '$certificado', '$descricao', '$horarioInicialDisp', '$horarioFinalDisp', '$foto', '$antecedentesCriminais, '$declaracaoVacina')";

        if (mysqli_query($conn, $sql)) {
            $mensagem = "Cuidador cadastrado com sucesso!";
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
    <title>Cadastro de Cuidador</title>
    <link rel="stylesheet" href="assets/css/cadastro.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro de Cuidador</h2>
        <form method="POST" action="">
            <label for="status">Status:</label><br>
            <input type="radio" id="ativo" name="status" value="ativo">
            <label for="status">Ativo</label><br>
            <input type="status" id="inativo" name="status" value="inativo">
            <label for="status">Inativo</label><br>

            <label for="nomeCompleto">Nome Completo:</label><br>
            <input type="text" name="nomeCompleto" placeholder="Digite seu nome" required><br>

            <label for="cpf">CPF:</label><br>
            <input type="cpf" name="cpf" placeholder="CPF" required><br>
            
            <label for="dataNascimento">Data de Nascimento:</label><br>
            <input type="date" name="dataNascimento" placeholder="Data de Nascimento" required><br>

            <label for="CEP">CEP:</label><br>
            <input type="text" name="senha2" placeholder="Repita sua senha" required><br>

            <input type="submit" class="cadastrar" value="Cadastrar">
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
