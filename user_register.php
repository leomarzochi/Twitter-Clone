<?php
    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objetoDb = new db();
    $link = $objetoDb->conecta_mysql();

    $query = " insert into usuarios(usuario, email, senha) values ('$usuario','$email','$senha')";

    //Executar a query

    if(mysqli_query($link, $query)){
        echo 'Usuário criado com sucesso';
    }
    else {
        echo 'Erro ao registrar novo usuário!';
    }
?>