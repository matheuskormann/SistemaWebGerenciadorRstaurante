<?php
session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: http://localhost/BlazeRestaurante/index.php");
?>
<script>
    alert("para continuar realize o login");
</script>
<?php
  } 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Blaze Restaurante</h1>
    </header>
    <main>

        <label for="buttonUsers">Usuarios</label>
        <a class="botao-link" href="../users/users_lst.php">
        controle de Usuarios
        </a>
    </main>

</body>
</html>