<html>
    <head>
        <title>Dados do usuário</title>
    </head>
    <body>
        <?php
            include('../connection.php');

            $id = $_GET["id"];
            $sql = "SELECT name, password, role FROM login WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "id: $id<br>";
                    echo "Nome: {$row['name']}<br>";
                    echo "Senha: {$row['password']}<br>";
                    echo "Cargo: {$row['role']}";
                }
            }
        ?>
    </body>
</html>