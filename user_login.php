<?php

    session_start();
    
    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $objetoDb = new db();
    $link = $objetoDb->conecta_mysql();
    
    $query = " SELECT usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

    $resultado_id = mysqli_query($link, $query);
    
    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if(isset($dados_usuario['usuario'])){

            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['email'] = $dados_usuario['email'];

            header('Location: home.php');
        }
        else {
            header('Location: index.php?erro=1');
        }
    }
    else{
        echo 'Erro na consulta a base de dados';
    }
   
?>