<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Idoso</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fdf4f1;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #fb745c;
            text-align: center;
            margin-bottom: 30px;
        }

        h3,
        h1 {
            text-align: center;
        }

        h3 a {
            text-decoration: none;
            color: #fb745c;
            font-weight: bold;
            padding: 10px 15px;
            background-color: #ffe4de;
            border: 1px solid #fbc2b6;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            transition: 0.3s ease;
        }

        h3 a:hover {
            background-color: #fbc2b6;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            width: 80%;
            align-self: auto;
            justify-content: center;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #e0e0e0;
            color: #424242;
            text-align: left;
        }

        table tr:hover {
            background-color: #fff2ef;
        }

        form {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            width: 250px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #fb745c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #e35f4b;
        }

        img {
            vertical-align: middle;
        }

        .center {
            text-align: center;
            justify-content: center;
            align-items: center;
            align-content: center;
        }
    </style>
</head>

<body>
<?php
$selecao = isset($_GET['selecao']) ? $_GET['selecao'] : null;
?>
    <h1 style="text-align:center;">Pesquisa de Idoso</h1>
    <?php
    

    /* início do esconder */
    if ($selecao == "1") { ?>
        <h3><a href="pesquisausuario.php?selecao=0">Listar todos os Idosos cadastrados</a></h3>
    <?php } ?>

    <?php
   
    /* início do mostrar todos */
    if ($selecao == "0") { ?>
        <h3><a href="pesquisaidoso.php?selecao=1">Esconder</a></h3>
        <?php
        include('conexao.php');
        $sql = "SELECT * FROM idoso";
        $resultado = mysqli_query($conn, $sql);
        ?>
        <div>
            <table class="center">
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td class="center">Update</td>
                    <td class="center">Delete</td>
                </tr>
                <?php
                if (mysqli_num_rows($resultado) == 0) {
                    echo "<tr> <td colspan=3> nenhum usuario cadastrado </td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td><?= $row['ididoso']; ?></td>
                            <td><?= $row['nomeCompleto']; ?></td>
                            <td><?= $row['descricao']; ?></td>
                            <td class="center"><a href="alteraridoso.php?id=<?= $row['ididoso']; ?>"><img style="width:30px"
                                        src="assets/img/edit.png"></a></td>
                            <td class="center"><a href="apagaridoso.php?id=<?= $row['ididoso']; ?>"><img style="width:30px"
                                        src="assets/img/delete.png"></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

        <?php }
    }
    ?>

<form action="" method="post">
        <input type="text" name="pesquisa" placeholder="Pesquisar Usuário">
        <input type="submit" value="buscar">
    </form>
    
    <?php

    /* início do mostrar todos */
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include('conexao.php');
        $busca = $_POST['pesquisa'];
        $sql = "SELECT * FROM idoso WHERE nomeCompleto LIKE '%$busca%' ORDER BY nomeCompleto ASC";
       
        $resultado = mysqli_query($conn, $sql);
        ?>
        <div>
            <table class="center">
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td class="center">Update</td>
                    <td class="center">Delete</td>
                </tr>
                <?php
                if (mysqli_num_rows($resultado) == 0) {
                    echo "<tr> <td colspan=3> nenhum usuario cadastrado </td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <tr>
                            <td><?= $row['ididoso']; ?></td>
                            <td><?= $row['nomeCompleto']; ?></td>
                            <td><?= $row['descricao']; ?></td>
                            <td class="center"><a href="alteraridoso.php?id=<?= $row['ididoso']; ?>"><img style="width:30px"
                                        src="assets/img/edit.png"></a></td>
                            <td class="center"><a href="apagaridoso.php?id=<?= $row['ididoso']; ?>"><img style="width:30px"
                                        src="assets/img/delete.png"></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

        <?php }
    }
    ?>
    
</body>

</html>