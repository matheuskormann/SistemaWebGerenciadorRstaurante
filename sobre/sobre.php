<?php
session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: ../index.php");
?>
<script>
    alert("para continuar realize o login");
</script>
<?php
  } 
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>
  <link rel="stylesheet" href="sobreStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <h1>sobre</h1>
        <a id="botaoVoltar" href="../home/home.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <div id="conteinersobre">
            <h2>creditos</h2>
            <p>Matheus Kormann <br>Lucas Baumer <br>Murilo Mayer</p>
         
          
        </div>
    </body>
</html>