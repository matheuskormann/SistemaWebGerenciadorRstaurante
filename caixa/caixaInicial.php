<?php
    include('../connection.php');

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    }
    else if ($_SESSION["id"] > 5 ) {
?>
<script>
    alert("Você não tem permissão de exclusão no sistema");
    history.go(-1);
</script>
<?php
    }
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/caixaInicialLstStyle.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
</head>
<body>
<h1>Blaze Restaurante</h1>
    <h2>Caixa</h2>
<a id="botaoVoltar" href="../home/home.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
<div id="conteinercaixa"> 
    <h3>fechar Mesa: </h3>
            <form name="form1" id="form1" method="post" action="caixaMesa.php">
                <input type="text" name="txtMesaCaixa" placeholder=" mesaCaixa"><br>
                <input id="inputEnviar" type="submit" value="Enviar">
            </form>

</div>





    
</body>
</html>