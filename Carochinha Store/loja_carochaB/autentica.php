<?php 

include ('connection.php');

if(isset($_POST['login']) || isset($_POST['senha'])) {

if(strlen($_POST['login']) == 0) {
    echo "Preencha seu e-mail";
} else if(strlen($_POST['senha']) == 0) {
    echo "Preencha sua senha";
} else {

    $login = $mysqli->real_escape_string($_POST['login']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    echo "login: " . $login . " " . $senha;
    $sql_code = "SELECT * FROM utilizador WHERE login = '$login' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {
        
        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['login'] = $usuario['login'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo'];
        $_SESSION['idutilizador'] = $usuario['id'];


        header("Location: painel.php");

    } else {
        echo "<script>alert('Falha ao logar! E-mail ou senha incorretos');</script>";
        header("Location: login.php");
    }

}
}
?>
