<?php
include('conexao.php');

$mensagem = "";
$mensagemTipo = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statusCuidador = 1;
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


    $sql = "INSERT INTO cuidador (statusCuidador, nomeCompleto, CPF, dataNascimento, CEP, cidade, UF, bairro, rua, numero, complemento, certificado, descricao, horarioInicialDisp, horarioFinalDisp, foto, antecedentesCriminais, declaracaoVacina)
                VALUES ('$statusCuidador', '$nomeCompleto', '$CPF', '$dataNascimento', '$CEP', '$cidade', '$UF', '$bairro', '$rua', '$numero', '$complemento', '$certificado', '$descricao', '$horarioInicialDisp', '$horarioFinalDisp', '$foto', '$antecedentesCriminais, '$declaracaoVacina')";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/cadastro.css">
</head>

<body>
    <div class="container">
        <h2>Cadastro de Cuidador</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="nomeCompleto">Nome Completo:</label>
                    <input type="text" name="nomeCompleto" required>
                </div>
            </div>
            <div class="row"></div>
            <div class="col-6">
                <label for="CPF">CPF:</label>
                <input type="text" name="CPF" required>
            </div>
            <div class="col-3">
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="date" name="dataNascimento" required>
                <div class="col-3">
                    <label for="CEP">CEP:</label>
                    <input type="text" name="CEP" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" required>
                </div>
                <div class="col">
                    <label for="UF">UF:</label>
                    <input type="text" name="UF" required>
                </div>
                <div class="col">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" required>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="rua">Rua:</label>
                        <input type="text" name="rua" required>
                    </div>
                    <div class="col">
                        <label for="numero">Número:</label>
                        <input type="text" name="numero" required>
                    </div>
                    <div class="col">

                        <label for="complemento">Complemento:</label>
                        <input type="text" name="complemento">
                    </div>
                </div>
                <div class="row">
                <div class="col">
                <label for="certificado">Certificado:</label>
                <input type="file" name="certificado" accept=".pdf" required>
                </div>
                <div class="col">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" required>
                </div>
                </div>
                <div class="row">
                <div class="col">
                <label for="horarioInicialDisp">Horário Inicial Disponível:</label>
                <input type="time" name="horarioInicialDisp" required>
                </div>
                <div class="col">
                <label for="horarioFinalDisp">Horário Final Disponível:</label>
                <input type="time" name="horarioFinalDisp" required>
                </div>
                </div>
                <div class="row">
                <div class="col">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="formFile" accept="image/*" required>
                </div>
                <div class="col">
                <label for="antecedentesCriminais">Antecedentes Criminais:</label>
                <input type="file" name="antecedentesCriminais" required class="formControl">
                <div class="col">
                <label for="declaracaoVacina">Declaração de Vacinas:</label>
                <input type="file" name="declaracaoVacina" class="formFile">
                </div>
                </div>
                <input type="submit" class="cadastrar" value="Cadastrar">
        </form>

        <div class="mensagem sucesso" id="mensagem-box">
        </div>
    </div>

    <script>
        const msgBox = document.getElementById('mensagem-box');
        if (msgBox.textContent.trim() !== '') {
            msgBox.style.display = 'block';
        }
    </script>
</body>

</html>