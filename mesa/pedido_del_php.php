<?php
    include('../connection.php');

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
    }
    else if ($_SESSION["id"] != 1 || $_SESSION["id"] == $id ) {
?>
<script>
    alert("Você não tem permissão de exclusão no sistema");
    history.go(-1);
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
    alert('pedido removido com sucesso!!!');
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
    }
?>