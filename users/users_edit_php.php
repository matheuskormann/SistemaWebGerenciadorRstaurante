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

            $name = $_POST["txtName"];
            $password = $_POST["txtPassword"];
            $role = $_POST["txtRole"];
            $id = $_POST["hidId"];
            $sql = "UPDATE login SET name = '$name', password = '$password', role = '$role' WHERE id = $id";
            $result = $conn->query($sql);

            if ($result === TRUE) {
?>
<script>
    alert('Usuário editado com sucesso!!!');
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
?>
    </body>
</html>