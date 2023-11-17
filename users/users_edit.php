<?php
include('../connection.php');
session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: http://localhost/BlazeRestaurante/SistemaWedGerenciadorRstaurante/index.php");
?>
<script>
    alert("para continuar realize o login");
</script>
<?php
  } 
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de usuário</title>
  <link rel="stylesheet" href="usersEditStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    
    </head>
    <body>
        <?php
            $id = $_GET["id"];
            $sql = "SELECT name, login , password, role FROM funcionario WHERE id_funcionario = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $name = $row["name"];
                    $login = $row["login"];
                    $password = $row["password"];
                    $role = $row["role"];
                }
            }
        ?>
        <h1>Blaze Restaurante</h1>
        <a id="botaoVoltar" href="../users/users_lst.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <div id="conteinereditor">
            <h2>Editar Usuário</h2>
            <form name="form1" id="form1" method="post" action="users_edit_php.php">
            <p><img src="../imagens/iconName.png" alt="voltarHome" style="width: 15px; height: 15px;"> Nome:</p>
                <input type="text" name="txtName" value="<?php echo $name ?>">
                <p><img src="../imagens/envelope.png" alt="voltarHome" style="width: 15px; height: 15px;"> Login:</p>
                <input type="text" name="txtlogin" value="<?php echo $login ?>">
                <p><img src="../imagens/chave.png" alt="voltarHome" style="width: 15px; height: 15px;"> Senha:</p>
                <input type="text" name="txtPassword" value="<?php echo $password ?>">
                <p><img src="../imagens/pasta.png" alt="voltarHome" style="width: 15px; height: 15px;"> Cargo:</p>
                <input type="text" name="txtRole" value="<?php echo $role ?>">
                <input type="hidden" name="hidId" value="<?php echo $id ?>">
                <input id="inputEnviar" type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>