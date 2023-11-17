<html>
    <head>
        <title>Dados do Produto</title>
    </head>
    <body>
        <?php
            include('../connection.php');

            $nameProd = $_POST["txtNameProd"];
            $valorProd = $_POST["txtvalorProd"];
            $tipoProd = $_POST["txttipoProd"];
            $sql = "INSERT INTO produto (valor_produto,nome_produto,tipo_produto) VALUES('$valorProd','$nameProd','$tipoProd')";
            $result = $conn->query($sql);

            if ($result === TRUE) {
?>
<script>
    alert('produto cadastrado com sucesso!!!');
    location.href = 'menu_lst.php';
</script>
<?php
            }
            else {
?>
<script>
    alert('Algo não deu certo...');
    history.go(-1);
</script>
<?php
            }
?>
    </body>
</html>