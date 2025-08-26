<?php
include('conexao.php');

$sql_responsavel = "SELECT idresponsavel, nomeCompleto FROM responsavel ORDER BY nomeCompleto ASC";
$result_responsavel = mysqli_query($conn, $sql_responsavel);

$mensagem = "";
$mensagemTipo = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statusidoso = 1;
    $idresponsavel = $_POST['idresponsavel'];
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



        $sql = "INSERT INTO idoso (statusidoso, idresponsavel, nomeCompleto, CPF, dataNascimento, CEP, cidade, UF, bairro, rua, numero, complemento, limitacoesFisicas, descricao)
                VALUES ('$statusidoso', '$idresponsavel', '$nomeCompleto', '$CPF', '$dataNascimento', '$CEP', '$cidade', '$UF', '$bairro', '$rua', '$numero', '$complemento', '$limitacoesFisicas', '$descricao')";

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
    <title>Cadastro de Idoso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
     <link rel="stylesheet" href="assets/css/cadastro.css">
</head>
<body>
<div class="container">
        <h2>Cadastro de Idoso</h2>
        <form action="" method="post" class="">
            <div class="row">
            <div class="col">
            <label for="nomeCompleto">Nome Completo</label>
            <input type="text" name="nomeCompleto" required>
            </div>
            </div>
            <div class="row">
            <div class="col">
            <label for="CPF">CPF</label>
            <input type="text" name="CPF" required pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}">
            </div>
            <div class="col">
            <label for="dataNascimento">Data de Nascimento</label>
            <input type="date" name="dataNascimento" required>
            </div>
            </div>
            <div class="row">
            <div class="col-3">
            <label for="CEP">CEP</label>
            <input type="text" name="CEP" required>
            </div>
            <div class="col">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" required>
            </div>
            <div class="col-3">
            <label for="UF">UF</label>
            <input type="text" name="UF" required>
            </div>
            </div>
            <div class="row">
            <div class="col-5">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" required>
            </div>
            <div class="col-5">
            <label for="rua">Rua</label>
            <input type="text" name="rua" required>
            </div>
            <div class="col-2">
            <label for="numero">Número</label>
            <input type="text" name="numero" required>
            </div>
            </div>
            <div class="row">
            <div class="col">
            <label for="complemento">Complemento</label>
            <input type="text" name="complemento">
            </div>
            <div class="col">
            <label for="limitacoesFisicas">Limitações Físicas</label>
            <input type="text" name="limitacoesFisicas">
            </div>
            <div class="col">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao">
            </div>
            </div>
            <div class="row">
                <div class="col">
                        <label for="responsavel">Selecionar Responsável</label>
                        <select name="idresponsavel" required class="form-select">
                            <option value="" selected>Selecione...</option>
                            <?php while ($dados = mysqli_fetch_assoc($result_responsavel)) { ?>
                                <option value="<?php echo $dados['idresponsavel']; ?>">
                                    <?php echo $dados['nomeCompleto']; ?>
                                </option>
                            <?php } ?>
                        </select>
                </div>
            </div>
<br>
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