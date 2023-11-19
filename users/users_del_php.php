<?php
    include('../connection.php');

    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: ../index.php ");
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
        $sql = "DELETE FROM funcionario WHERE id_funcionario = $id";
        $result = $conn->query($sql);

        if ($result === TRUE) {
?>
<script>
    alert('Usuário removido com sucesso!!!');
    location.href = 'users_lst.php';
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