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
  if (isset($_POST['logout'])) {
    session_unset();

    
    session_destroy();

    
    header("Location: http://localhost/BlazeRestaurante/SistemaWedGerenciadorRstaurante/index.php");
    exit();
}
include('../connection.php');

$sqlFunc = "SELECT * FROM funcionario";
$resultFunc = $conn->query($sqlFunc);
$sqlPedi = "SELECT * FROM pedido";
$resultPedi = $conn->query($sqlPedi);
$sqlProd = "SELECT * FROM produto";
$resultPord = $conn->query($sqlProd);
$sql = "SELECT COUNT(*) as quantidade FROM Mesa WHERE status_mesa = 0";
$resultado = $conn->query($sql);

$row = $resultado->fetch_assoc();
$quantidade = $row['quantidade'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>homepage</title>
    <link rel="stylesheet" href="HomeStyle.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
</head>
<body>
    

    <h1>Blaze Restaurante</h1>
    <h2>home</h2>
    <button id="buttonMenu" onclick="abrirmenu()"><img src="..\imagens\menu-hamburguer.png" alt=""></button>    
    <div id="conteinerhome">
        <div class="homeDados" id="conteinerNumeroPedidosAbertos">
            <div class="infohome">
               <img src="../imagens/nomeProd.png" alt="" style="width: 55px; height: 55px;">
                <h3>: <?php echo $quantidade ?></h3>

            </div>
        </div> 
        <div class="homeDados" id="conteinerNumeroFuncionarios">
            <div class="infohome">
                <img src="../imagens/iconName.png" alt="" style="width: 55px; height: 55px;">
                <h3>: <?php echo $resultFunc->num_rows ?></h3>
            </div>
        </div>
        <div class="homeDados" id="conteinerNumeroProdutos">
            <div class="infohome">
               <img src="../imagens/caixa-aberta.png" alt="" style="width: 55px; height: 55px;">
               <h3>: <?php echo $resultPord->num_rows ?></h3>

            </div>
        
        </div> 
        
        
    </div>
    <div id="menubar">
        <button id="fecharMenu" onclick="fecharmenu()"><img src="..\imagens\cruz.png" alt=""></button>
        <form method="post" action="">
        <button id="buttonLogout" type="submit" name="logout"><img src="..\imagens\saida.png" alt="logout"></button>
        </form>

    <?php
            include('../connection.php');

            $id = $_SESSION["id"];
            $sql = "SELECT name,login , role FROM funcionario WHERE id_funcionario = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
        <div id="conteinerDados">
            <p id="usernome"><img src="../imagens/iconName.png" alt="" style="width: 15px; height: 15px;"> : <?php echo $row["name"] ?></p>
            <p id="userlogin"><img src="../imagens/envelope.png" alt="" style="width: 15px; height: 15px;"> : <?php echo $row["login"] ?></p>
            <p id="usercargo"><img src="../imagens/pasta.png" alt=""  style="width: 15px; height: 15px;"> :  <?php echo $row["role"] ?></p>
        </div>
        <div id="menubuttons">
            <a class="menuItem" href="../users/users_lst.php">Usuarios</a>
            <a class="menuItem" href="../menu/menu_lst.php">Menus</a>
            <a class="menuItem" href="../mesa/menuMesas.php">Messas</a>
            <a class="menuItem" href="../caixa/caixaInicial.php">Caixa</a>
            <a class="menuItem" href=""></a>
            
        </div>
        

<?php
                }
            }
        ?>


    </div>

    <script>
    function abrirmenu() {
    document.getElementById("menubar").style.display = 'block';
    document.getElementById("buttonMenu").style.display = 'none';
    }
    function fecharmenu() {
    document.getElementById("menubar").style.display = 'none';
    document.getElementById("buttonMenu").style.display = 'block';
    }


    </script>

</body>
</html>