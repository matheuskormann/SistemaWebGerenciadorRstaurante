<?php
include('../connection.php');
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
    <title>Edição de Produto</title>
  <link rel="stylesheet" href="menuEditStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    
    </head>
    <body>
        <?php
            $id = $_GET["id"];
            $sql = "SELECT id_produto, valor_produto, nome_produto, tipo_produto FROM produto WHERE id_produto = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $nameProd = $row["nome_produto"];
                    $valorProd = $row["valor_produto"];
                    $tipoProd= $row["tipo_produto"];
                }
            }
        ?>
        <h1>Blaze Restaurante</h1>
        <a id="botaoVoltar" href="../menu/menu_lst.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <div id="conteinereditor">
            <h2>Editar Produto</h2>
            <form name="form1" id="form1" method="post" action="menu_edit_php.php">
            <p> Nome Produto:</p>
                <input type="text" name="txtNameProd" value="<?php echo $nameProd ?>">
                <p> Valor Produto:</p>
                <input type="text" name="txtvalorProd" value="<?php echo $valorProd ?>">
                <p> Tipo Produto:</p>
                <input type="text" name="txttipoProd" value="<?php echo $tipoProd ?>">
                <input type="hidden" name="hidId" value="<?php echo $id ?>">
                <input id="inputEnviar" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>