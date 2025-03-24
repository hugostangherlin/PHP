<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email){

    //Busque no banco de dados todos os usarios que tenham esse e-mail
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();


    if($sql->rowCount() === 0){

    //Vai funcionar, porém
    //Esse tipo de inserção deixa o nosso código vulneravel para diversos tipos de ataques externos
    //$pdo->query("INSERT INTO usuario (nome, email) VALUES ('$name', '$mail')");

    //Vamos estudar o método correto
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->execute();

            //Depois que adicionou o usuário, voltamos para o index.php
            header("Location: index.php");
            exit;
    }else{
        header("Location:adicionar.php");
        exit;
    }
    

}else {
    header("Location:adicionar.php");
    exit;
}
