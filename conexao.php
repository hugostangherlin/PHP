<?php 
//Instanciando a classe PDO
$pdo = new PDO("mysql:dbname=projeto_etc;host=localhost", "root");
//Faz a consulta na tabela usuários do banco de dados
$sql = $pdo->query('SELECT * FROM usuarios');
//Conta quantas linhas de registro
echo "TOTAL: ".$sql->rowCount();
//Cria uma variavel dados e associada cada uma delas
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
//Pre configura a saida
echo '<pre>';
print_r($dados);
 