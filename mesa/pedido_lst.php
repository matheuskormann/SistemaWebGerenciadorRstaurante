<?php
session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: ../index.php ");
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
  <link rel="stylesheet" href="pedidoLstStyle.css">
  <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    </head>
    <body>
<?php
    include('../connection.php');

    $id = $_GET["id_mesa"];
    $sql = "SELECT
    pedido.id_pedidos AS id_pedido,
    pedido.fk_Mesa_id_mesa AS id_mesa,
    produto.nome_produto,
    produto.valor_produto
    FROM
        pedido
    JOIN produto ON pedido.fk_produto_id_produto = produto.id_produto
    JOIN Mesa ON pedido.fk_Mesa_id_mesa = Mesa.id_mesa 
    WHERE id_mesa = $id;";
    $result = $conn->query($sql);
    $sqlsoma = "SELECT
    pedido.fk_mesa_id_mesa AS id_mesa,
    SUM(produto.valor_produto) AS total_valor_pedidos
FROM
    pedido
JOIN produto ON pedido.fk_produto_id_produto = produto.id_produto
WHERE
    pedido.fk_mesa_id_mesa = $id;";
    $resultsoma = $conn->query($sqlsoma);
?>
    <h1>mesa: <?php echo $id?></h1>
    <div id="conteinerButtom">
        <a id="botaoVoltar" href="../mesa/menuMesas.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a> 
        <br><br>
        <?php echo '<a id="botaoAdicionar" href="novo_pedido.php?id_mesa=' .$id. '"> '?>
        <img src="../imagens/mais.png" alt="AddUser" style="width: 30px; height: 30px;"></a>
        </div>
    <br><br>
    <div id="coneinerTabela">
        <table>
            <tr>
               <th>Id pedido</th>
               <th>Mesa</th>
               <th>nome produto</th>
               <th>valor Porduto</th>
               <th colspan=2>Ações</th>
            </tr>
<?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <tr>    
                <td>
                    <a href="users_user.php?id=<?php echo $row['id_pedido'] ?>">
                    <img src="../imagens/restaurante.png" alt="user" style="width: 15px; height: 15px;">: <?php echo $row["id_pedido"] ?>
                    </a>
                </td>
                <td><?php echo $row["id_mesa"] ?></td>
                <td><?php echo $row["nome_produto"] ?></td>
                <td><?php echo $row["valor_produto"] ?></td>
                
                <td><a href="pedido_edit.php? id=<?php echo $row['id_pedido']?>"><img src="../imagens/editar.png" alt="edit" style="width: 15px; height: 15px;"></a></td>
                <td onclick="excluir(<?php echo $row['id_pedido'] ?>)"><a href="#"><img src="../imagens/lixo.png" alt="delet" style="width: 15px; height: 15px;"></a></td>
            </tr>
<?php
        }
    }
?>  
        </table>
        <div>
        <!-- soma do valor pedido -->
        </div>
    </div>
    <script>
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir este Pedido?")) {
                location.href = "Pedido_del_php.php?id=" + id;
            }
        }
    </script>
    </body>
</html>