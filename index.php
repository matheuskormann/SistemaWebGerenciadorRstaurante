<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blaze Restaurante login</title>
  <link rel="stylesheet" href="LoginStyle.css">
  <link rel="shortcut icon" href="./imagens/favicon.ico" type="image/x-icon">
</head>
    <body>
        <img id="LogoBlazeRestaurante" src="./imagens/LogoBlazeRestaurante.png" alt="BLEZE">
        <form name="form1" method="post" action="login_php.php">

            <div id="conteinerLogin">
                <h1>Login</h1>
                <p>Login:</p>
                <input id="inputLogin" type="text" name="txtLogin">
                <p>Senha:</p>
                <input id="inputPasswoed" type="password" name="txtPassword">
                <br>
                <input id="inputEnviar" type="submit" value="Enviar">
            </div>
           
        </form>
    </body>
</html>