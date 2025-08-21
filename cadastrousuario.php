<?php
include('conexao.php');

$mensagem = "";
$mensagemTipo = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    if ($senha === $senha2) {

        $sql = "INSERT INTO usuarios (nome, email, senha)
                VALUES ('$nome', '$email', '$senha')";

        if (mysqli_query($conn, $sql)) {
            $mensagem = "Usuário cadastrado com sucesso!";
            $mensagemTipo = "sucesso";
            header("refresh:2;url=index.php");
        } else {
            $mensagem = "Erro ao cadastrar: " . mysqli_error($conn);
            $mensagemTipo = "erro";
        }
    } else {
        $mensagem = "As senhas não coincidem!";
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
        <h2>Cadastro de Usuário</h2>
        <form method="POST" action="">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" placeholder="Digite seu nome" required><br>

            <label for="email">E-mail:</label><br>
            <input type="email" name="email" placeholder="Digite seu e-mail" required><br>
            
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" placeholder="Digite sua senha" required><br>

            <label for="senha2">Repita a Senha:</label><br>
            <input type="password" name="senha2" placeholder="Repita sua senha" required><br>

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
