<?php
include('conexao.php')

if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) ==0) {
        echo "Preencha o seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli ->real_escape_string($_POST['email']);
        $senha = $mysqli ->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = 'email' AND senha = 'senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        
        $quantidade = $sql_query->num_rows;
        if($quantidade  == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['user'] = $usuario['id'];

        } else {
            echo "E-mail ou senha incorretos";
        }
    
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="logincontainer"> 
    <h1>Acesse sua Conta</h1>
    <form action="" method="POST">
        <p>
        <label> E-mail </label>
        <input type="text" name="email">
        </p>

        <p>
        <label> Senha </label>
        <input type="password" name="senha">
        </p>

        <p>
        <button type="submit"> Entrar </button>
        </p>

    </form>
      </div>
</body>
</html>