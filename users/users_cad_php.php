<html>
    <head>
        <title>Dados do usuário</title>
    </head>
    <body>
        <?php
            include('../connection.php');

            $name = $_POST["txtName"];
            $password = $_POST["txtPassword"];
            $role = $_POST["txtRole"];
            $login = $_POST["txtLogin"];
            $sql = "INSERT INTO funcionario(name, password,login, role) VALUES('$name', '$password','$login', '$role')";
            $result = $conn->query($sql);

            if ($result === TRUE) {
?>
<script>
    alert('Usuário cadastrado com sucesso!!!');
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