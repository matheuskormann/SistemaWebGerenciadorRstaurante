<html>
    <head>
        <title>Dados do usuário</title>
    </head>
    <body>
        <?php
            include('../connection.php');

            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
            }
            $id_produto = $_POST["id_prod"];
            $id_funcionario = $_SESSION["id"];
            $id_pedido = $_POST["id_pedido"];
            $sql = "UPDATE pedido SET fk_produto_id_produto = '$id_produto', fk_funcionario_id_funcionario = '$id_funcionario' WHERE id_pedidos = $id_pedido";
            
            $result = $conn->query($sql);
            
            if ($result === TRUE) {
?>
<script>
    alert('Pedido editado com sucesso!!!');
    location.href = 'menuMesas.php';
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