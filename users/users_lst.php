<?php
session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: ../index.php");
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
    <title>Users list Blaze Restaurante</title>
  <link rel="stylesheet" href="usersLstStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    </head>
    <body>
<?php
    include('../connection.php');

    $sql = "SELECT id_funcionario, name,login, password, role FROM funcionario";
    $result = $conn->query($sql);
?>
    <h1>Número de Users: <?php echo $result->num_rows ?></h1>
    <div id="conteinerButtom">
        <a id="botaoVoltar" href="../home/home.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <br><br>
        <a id="botaoAdicionar" href="users_cad.php">
        <img src="../imagens/adicionarUsuario.png" alt="AddUser" style="width: 30px; height: 30px;"></a>
        </div>
    <br><br>
    <div id="coneinerTabela">
        <table>
            <tr>
               <th>Id</th>
               <th>Nome</th>
               <th>Login</th>
               <th>Senha</th>
               <th>Cargo</th>
               <th colspan=2>Ações</th>
            </tr>
<?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <tr>
                <td>
                    <a href="users_user.php?id=<?php echo $row['id_funcionario'] ?>">
                    <img src="../imagens/idUser.png" alt="user" style="width: 15px; height: 15px;">: <?php echo $row["id_funcionario"] ?>
                    </a>
                </td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["login"] ?></td>
                <td><?php echo $row["password"] ?></td>
                <td><?php echo $row["role"] ?></td>
                <td><a href="users_edit.php?id=<?php echo $row['id_funcionario'] ?>"><img src="../imagens/editar.png" alt="edit" style="width: 15px; height: 15px;"></a></a></td>
                <td onclick="excluir(<?php echo $row['id_funcionario'] ?>)"><a href="#"><img src="../imagens/lixo.png" alt="delet" style="width: 15px; height: 15px;"></a></td>
            </tr>
<?php
        }
    }
?>  
        </table>
    </div>
    <script>
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir este registro?")) {
                location.href = "users_del_php.php?id=" + id;
            }
        }
    </script>
    </body>
</html>