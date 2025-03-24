<?php
//Dados de conexao
$db_name = 'projeto_etc';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
//Instanciando a classe PDO
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
