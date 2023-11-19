<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../index.php");
    ?>
    <script>
        alert("Para continuar, realize o login");
        location.href = '../index.php';
    </script>
    <?php
    exit; 
}

include('../connection.php');

$id_produto = $_POST["id_prod"];
$id_mesa = $_POST["id_mesas"];
$id_funcionario = $_SESSION["id"];

$sql = "INSERT INTO pedido (fk_produto_id_produto, fk_funcionario_id_funcionario, fk_mesa_id_mesa) VALUES ('$id_produto','$id_funcionario','$id_mesa')";
$result = $conn->query($sql);

if ($result === TRUE) {
    $sql_update_mesa = "UPDATE mesa SET status_mesa = '0' WHERE id_mesa = $id_mesa";
    $result_update_mesa = $conn->query($sql_update_mesa);

    if ($result_update_mesa === TRUE) {
        ?>
        <script>
            alert('pedido realizado com sucesso!!!');
            location.href = 'menuMesas.php';
        </script>
        <?php
        exit;
    } else {
        ?>
        <script>
            alert('Erro ao realizado o pedido da mesa.');
            history.go(-1);
        </script>
        <?php
        exit;
    }
} else {
    ?>
    <script>
        alert('Algo não deu certo...');
        history.go(-1);
    </script>
    <?php
    exit;
}
?>
</body>
</html>
