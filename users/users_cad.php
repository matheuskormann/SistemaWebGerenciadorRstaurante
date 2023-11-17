<?php
session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: http://localhost/BlazeRestaurante/SistemaWedGerenciadorRstaurante/index.php");
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
  <link rel="stylesheet" href="usersCadStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <h1>Cadastrar Novo Usuário</h1>
        <a id="botaoVoltar" href="../users/users_lst.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <div id="conteinereditor">
            <h2>Novo Usuário</h2>
            <form name="form1" id="form1" method="post" action="users_cad_php.php">
                <p><img src="../imagens/iconName.png" alt="voltarHome" style="width: 15px; height: 15px;">:</p>
                <input type="text" name="txtName" placeholder=" Nome"><br>
                <p><img src="../imagens/envelope.png" alt="voltarHome" style="width: 15px; height: 15px;">:</p>
                <input type="text" name="txtLogin" placeholder="  E-mail"><br>
                <p><img src="../imagens/chave.png" alt="voltarHome" style="width: 15px; height: 15px;">:</p>
                <input type="text" name="txtPassword" placeholder="  Senha"><br>
                <p><img src="../imagens/pasta.png" alt="voltarHome" style="width: 15px; height: 15px;">:</p>
                <input type="text" name="txtRole" placeholder="  Cargo"><br><br>
                <input id="inputEnviar" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>