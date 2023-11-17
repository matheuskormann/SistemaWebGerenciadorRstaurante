<?php
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
    <title>Users list Blaze Restaurante</title>
  <link rel="stylesheet" href="menuLstStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    </head>
    <body>
<?php
    include('../connection.php');

    $sql = "SELECT id_produto, valor_produto, nome_produto, tipo_produto FROM produto";
    $result = $conn->query($sql);
?>
    <h1>Número de Produtos: <?php echo $result->num_rows ?></h1>
    <div id="conteinerButtom">
        <a id="botaoVoltar" href="../home/home.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <br><br>
        <a id="botaoAdicionar" href="menu_cad.php">
        <img src="../imagens/mais.png" alt="AddUser" style="width: 30px; height: 30px;"></a>
        </div>
    <br><br>
    <div id="coneinerTabela">
        <table>
            <tr>
               <th>Id Produto</th>
               <th>Nome</th>
               <th>valor unit</th>
               <th>tipo</th>
               <th colspan=2>Ações</th>
            </tr>
<?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <tr>    
                <td>
                    <a href="users_user.php?id=<?php echo $row['id_produto'] ?>">
                    <img src="../imagens/restaurante.png" alt="user" style="width: 15px; height: 15px;">: <?php echo $row["id_produto"] ?>
                    </a>
                </td>
                <td><?php echo $row["nome_produto"] ?></td>
                <td><?php echo $row["valor_produto"] ?></td>
                <td><?php echo $row["tipo_produto"] ?></td>
                
                <td><a href="menu_edit.php? id=<?php echo $row['id_produto']?>"><img src="../imagens/editar.png" alt="edit" style="width: 15px; height: 15px;"></a></td>
                <td onclick="excluir(<?php echo $row['id_produto'] ?>)"><a href="#"><img src="../imagens/lixo.png" alt="delet" style="width: 15px; height: 15px;"></a></td>
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
                location.href = "menu_del_php.php?id=" + id;
            }
        }
    </script>
    </body>
</html>