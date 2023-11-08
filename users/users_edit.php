
<html>
    <head>
        <title>Edição de usuário</title>
    </head>
    <body>
        <?php
            include('../connection.php');

            session_start();
            if (!isset($_SESSION["id"])) {
                header("Location: index.php");
            }

            $id = $_GET["id"];
            $sql = "SELECT name, password, role FROM login WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $name = $row["name"];
                    $password = $row["password"];
                    $role = $row["role"];
                }
            }
        ?>
        <h1>Editar Usuário</h1>
        <form name="form1" id="form1" method="post" action="users_edit_php.php">
            Nome:<br>
            <input type="text" name="txtName" value="<?php echo $name ?>"><br>
            Senha:<br>
            <input type="text" name="txtPassword" value="<?php echo $password ?>"><br><br>
            Cargo:<br>
            <input type="text" name="txtRole" value="<?php echo $role ?>"><br><br>
            <input type="hidden" name="hidId" value="<?php echo $id ?>">
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>