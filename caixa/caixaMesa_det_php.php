<?php
    include('../connection.php');

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: ../index.php");
    }
    else if ($_SESSION["id"] != 1  ) {
?>
<script>
    alert("Você não tem permissão de exclusão no sistema");
    location.href = "caixaInicial.php";
</script>
<?php
    }
    else {
        $id = $_GET["id"];
        $sql = "DELETE FROM pedido WHERE id_pedidos = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
?>
<script>
    alert('Pedido removido com sucesso!!!');
    location.href = "caixaInicial.php";
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
    }
?>