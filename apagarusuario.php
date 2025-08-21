<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <title>Document</title>
</head>

<body>
   <?php
   include('conexao.php');
   $id = $_GET['id'];
   $sql = "DELETE FROM usuarios WHERE codusuario='$id'";
   if (mysqli_query($conn, $sql)) {
      ?>
      <div class="alert alert-success" role="alert">
         <h2 style="text-align: center;">Usuário deletado com SUCESSO!</h2>
         <?php header('refresh:2; url=pesquisausuario.php?selecao=1');  ?>
      </div>
      <?php
   }
   ?>
</body>

</html>