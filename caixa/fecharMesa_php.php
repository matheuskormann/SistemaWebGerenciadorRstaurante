<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: http://localhost/BlazeRestaurante/SistemaWedGerenciadorRstaurante/index.php");
    exit;
}

include('../connection.php');

$idMesa = $_GET["id"];

$sql = "DELETE FROM pedido WHERE fk_mesa_id_mesa = $idMesa";
$result = $conn->query($sql);

if ($result === TRUE) {
    $sql_update_mesa = "UPDATE mesa SET status_mesa = '1' WHERE id_mesa = $idMesa";
    // Corrigir a variável para $idMesa
    $result_update_mesa = $conn->query($sql_update_mesa);
    
    if ($result_update_mesa === TRUE) {
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sucesso</title>
        </head>
        <body>
            <script>
                alert('Mesa finalizada com sucesso!');
                location.href = 'caixaInicial.php';
            </script>
        </body>
        </html>
        <?php
        exit;
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Erro</title>
        </head>
        <body>
            <script>
                alert('Erro ao atualizar o status da mesa.');
                history.go(-1);
            </script>
        </body>
        </html>
        <?php
        exit;
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Erro</title>
    </head>
    <body>
        <script>
            alert('Erro ao excluir o pedido.');
            history.go(-1);
        </script>
    </body>
    </html>
    <?php
    exit;
}
?>
