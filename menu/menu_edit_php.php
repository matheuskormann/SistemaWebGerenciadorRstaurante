<html>
    <head>
        <title>Dados do usuário</title>
    </head>
    <body>
        <?php
            include('../connection.php');

            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: ../index.php");
            }

            $nameProd = $_POST["txtNameProd"];
            $valorProd = $_POST["txtvalorProd"];
            $tipoProd = $_POST["txttipoProd"];
            $id = $_POST["hidId"];
            $sql = "UPDATE produto SET nome_produto = '$nameProd', valor_produto = '$valorProd', tipo_produto = '$tipoProd' WHERE id_produto = $id";
            $result = $conn->query($sql);

            if ($result === TRUE) {
?>
<script>
    alert('Produto editado com sucesso!!!');
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