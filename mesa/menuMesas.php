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
   include('../connection.php');

   $sql = "SELECT * FROM mesa";
   $result = $conn->query($sql);

?>
 <script>
function mesaVerde(mesa) {
        style.backgroundColor = 'green';
    }
    function mesaVermelha(messa) {
        mesa.style.backgroundColor = 'red';
    }
</script>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
    <link rel="stylesheet" href="menuMesasStyle.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    <script src="MenuMesasScript.js" defer></script>
</head>
<body>
<div id="fundoMenu"></div>
    <header>
        <h1>Blaze Restaurante</h1>
        <h2>Mesas</h2>
        <a id="botaoVoltar" href="../home/home.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a>
    </header>
    <div id="conteinerMenu">
        <div id="conteinermessas">
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $buttonStyle = ($row['status_mesa'] == 1) ? 'style="background-color: green;"' : 'style="background-color: red;"';
                    echo '<a href="pedido_lst.php?id_mesa=' . $row['id_mesa'] . '" id="ButtonMessa' . $row["id_mesa"] . '" ' . $buttonStyle . '><img src="../imagens/icon_messa1.png" alt="Imagem" style="width: 60px; height: 60px;border-radius: 130px;"><br>Mesa ' . $row["id_mesa"] . '</a>';
                }
            }
            ?>
        </div>
    </div>

</body>
</html>