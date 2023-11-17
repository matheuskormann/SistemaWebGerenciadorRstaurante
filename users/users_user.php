<html>
    <head> <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do usuário</title>
   <link rel="stylesheet" href="usersDadosStyle.css">
   <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php
            include('../connection.php');

            $id = $_GET["id"];
            $sql = "SELECT name,login , password, role FROM funcionario WHERE id_funcionario = $id";
            $result = $conn->query($sql);
           


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

<h1>Blaze Restaurante</h1>
        <a id="botaoVoltar" href="../users/users_lst.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <div id="conteinerDados">
            <h2>Dados usuário:  <?php echo $id ?></h2>
            <p><img src="../imagens/iconName.png" alt="voltarHome" style="width: 15px; height: 15px;"> Nome: <?php echo $row["name"] ?></p>
            <p><img src="../imagens/envelope.png" alt="voltarHome" style="width: 15px; height: 15px;"> Login: <?php echo $row["login"] ?></p>
            <p><img src="../imagens/chave.png" alt="voltarHome" style="width: 15px; height: 15px;"> Senha:  <?php echo $row["password"] ?></p>
            <p><img src="../imagens/pasta.png" alt="voltarHome" style="width: 15px; height: 15px;"> Cargo:  <?php echo $row["role"] ?></p>
        </div>

<?php
                }
            }
        ?>
    </body>
</html>