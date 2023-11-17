<?php
include('../connection.php');

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
} else if ($_SESSION["id"] > 5) {
    ?>
    <script>
        alert("Você não tem permissão de exclusão no sistema");
        history.go(-1);
    </script>
    <?php
}

$mesa = $_POST["txtMesaCaixa"];

// Consulta SQL para obter detalhes dos pedidos
$sql = "
SELECT 
    pedido.id_pedidos AS id_pedido,
    produto.nome_produto,
    pedido.fk_funcionario_id_funcionario AS id_funcionario,
    produto.valor_produto AS valor_unidade
FROM 
    pedido
JOIN 
    produto ON pedido.fk_produto_id_produto = produto.id_produto
JOIN 
    funcionario ON pedido.fk_funcionario_id_funcionario = funcionario.id_funcionario
JOIN 
    mesa ON pedido.fk_Mesa_id_mesa = mesa.id_mesa
WHERE 
    mesa.id_mesa = $mesa;
";

$result = $conn->query($sql);
$total_pedido = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blaze Restaurante</title>
    <link rel="stylesheet" href="./Style/caixaMesaLstStyle.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
</head>
<body>
    <h1>Blaze Restaurante</h1>
    <h2>mesa: <?php echo $mesa ?></h2>
    <a id="botaoVoltar" href="../home/home.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a>
    <div id="conteinercaixa">
        <div id="coneinerTabela">
            <table>
                <tr>
                    <th>Id pedido</th>
                    <th>nome produto</th>
                    <th>valor Porduto</th>
                    <th>id funcionario</th>
                    <th>Ações</th>
                </tr>
                <?php
               if ($result->num_rows > 0) {
                // Exibindo os resultados
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td>
                            <a href="users_user.php?id=<?php echo $row['id_pedido'] ?>">
                                <img src="../imagens/restaurante.png" alt="user" style="width: 15px; height: 15px;">
                                <?php echo $row["id_pedido"] ?>
                            </a>
                        </td>
                        <td><?php echo $row["nome_produto"] ?></td>
                        <td><?php echo $row["valor_unidade"] ?></td>
                        <td><?php echo $row["id_funcionario"] ?></td>
                        <td onclick="excluir(<?php echo $row['id_pedido'] ?>)">
                            <a href="#">
                                <img src="../imagens/lixo.png" alt="delet" style="width: 15px; height: 15px;">
                            </a>
                        </td>
                    </tr>
                <?php
                   $total_pedido += floatval($row["valor_unidade"]);
                }
            }
                ?>
            </table>
            <?php 
           
            ?>
            <div id="conteinerfinalizar">
           <h3>R$ <?php echo number_format($total_pedido, 2, ',', '.') ?></h3>
           <a id="fecharMesa" onclick="fecharmesa(<?php  $mesa ?>)" >fechar Mesa</a>
           </div>
        </div>
    </div>
    <?php echo'
    <script>
        function fecharmesa(mesa) {
            if (confirm("Tem certeza que deseja fechar essa mesa?")) {
                location.href = "fecharMesa_php.php?id=" + '.$mesa.';
            }
        }
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir este registro?")) {
                location.href = "caixaMesa_det_php.php?id=" + id;
            }
        }
    </script>
    '?>
</body>
</html>
