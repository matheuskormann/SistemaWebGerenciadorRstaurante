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
  <link rel="stylesheet" href="menuCadStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <h1>Cadastrar Novo Produto</h1>
        <a id="botaoVoltar" href="../menu/menu_lst.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <div id="conteinereditor">
            <h2>Novo Produto</h2>
            <form name="form1" id="form1" method="post" action="menu_cad_php.php">
                <p><img src="../imagens/nomeProd.png" alt="voltarHome" style="width: 15px; height: 15px;">:</p>
                <input type="text" name="txtNameProd" placeholder="  Nome produto"><br>
                <p><img src="../imagens/dimdin.png" alt="voltarHome" style="width: 15px; height: 15px;">:</p>
                <input type="text" name="txtvalorProd" placeholder="  Valor Produto"><br>
                <p><img src="../imagens/camadas.png" alt="voltarHome" style="width: 15px; height: 15px;">:</p>
                <input type="text" name="txttipoProd" placeholder="  Tipo produto"><br>
                <input id="inputEnviar" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>