<?php 
include_once"conexao.php"; //Incluir outro codigo 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listando úsuarios com LIMIT</title>
</head>
<body>
<h2>Listando úsuarios com LIMIT</h2>
<?php 

$query_usuarios = "SELECT * FROM usuarios LIMIT 2";
$result_usuarios = $conn->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($row_usuarioss);
   echo "id:". $row_usuarios ['id']. "<br>";
   echo "nome:". $row_usuarios ['nome']. "<br>";
   echo "email:". $row_usuarios ['email']. "<br>";
  echo "sits_usuario_id:". $row_usuarios ["sit_usuario_id"]."<br><hr>";

  
}
?>
<h2>Listando úsuarios com LIMIT e OFFSET</h2>
<?php 
$query_usuarios = "SELECT * FROM usuarios LIMIT 2 OFFSET 3";
$result_usuarios = $conn ->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
echo "id:" . $row_usuarios ["id"]. "<br>";
echo "nome". $row_usuarios ["nome"]. "<br>";
echo "email". $row_usuarios ["email"]. "<br>";
echo "sits_usuario_id:". $row_usuarios ["sit_usuario_id"]."<br>";
echo "niveis_acesso_id:". $row_usuarios ["niveis_acesso_id"]."<br><hr>";

}
?>
<h2>Listando usuarios através do ID</h2>
<?php 
$query_usuarios = "SELECT id, nome, email
                    FROM usuarios
                    WHERE id = 2";
$result_usuarios = $conn->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($row_usuarioss);
   echo "id:". $row_usuarios ['id']. "<br>";
   echo "nome:". $row_usuarios ['nome']. "<br>";
   echo "email:". $row_usuarios ['email']. "<br>";
   
}
?>
<h2>Listando usuarios através do Email</h2>
<?php 
$query_usuarios = "SELECT id, nome, email
                    FROM usuarios
                    WHERE email ='romulo@aula.com.br'
                    LIMIT 1";
$result_usuarios = $conn->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($row_usuarios);
   echo "id:". $row_usuarios ['id']. "<br>";
   echo "nome:". $row_usuarios ['nome']. "<br>";
   echo "email:". $row_usuarios ['email']. "<br>";
  
} 
?>
<h2>Listando usuarios através da situação de úsuario</h2>
<?php 
$query_usuarios = "SELECT id, nome, email, sit_usuario_id
                    FROM usuarios
                    WHERE sit_usuario_id = 2";
$result_usuarios = $conn->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($row_usuarioss);
   echo "id:". $row_usuarios ['id']. "<br>";
   echo "nome:". $row_usuarios ['nome']. "<br>";
   echo "email:". $row_usuarios ['email']. "<br>";
   echo "sit_usuario_id:". $row_usuarios ['sit_usuario_id']. "<br>";
  
} 
echo "<br><hr>";
?> 
<h2>Listando usuarios através dos niveis de acesso</h2>
<?php 
$query_usuarios = "SELECT id, nome, email, sit_usuario_id, niveis_acesso_id
                    FROM usuarios
                    WHERE niveis_acesso_id = 3";
$result_usuarios = $conn->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($row_usuarioss);
   echo "id:". $row_usuarios ['id']. "<br>";
   echo "nome:". $row_usuarios ['nome']. "<br>";
   echo "email:". $row_usuarios ['email']. "<br>";
   echo "sit_usuario_id:". $row_usuarios ['sit_usuario_id']. "<br>";
   echo "niveis_acesso_id". $row_usuarios ['niveis_acesso_id']. '<br>';
  
} 
echo "<br><hr>";
?> 
<h2>Listando usuarios através do AND</h2>
<?php 
$query_usuarios = "SELECT id, nome, email, sit_usuario_id, niveis_acesso_id
                    FROM usuarios
                    WHERE niveis_acesso_id = 2
                    AND sit_usuario_id = 2";
$result_usuarios = $conn->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($row_usuarioss);
   echo "id:". $row_usuarios ['id']. "<br>";
   echo "nome:". $row_usuarios ['nome']. "<br>";
   echo "email:". $row_usuarios ['email']. "<br>";
   echo "sit_usuario_id:". $row_usuarios ['sit_usuario_id']. "<br>";
   echo "niveis_acesso_id". $row_usuarios ['niveis_acesso_id']. '<br>';
  
} 
echo "<br><hr>";
?> 
<h2>Listando usuarios através do OR</h2>
<?php 
$query_usuarios = "SELECT id, nome, email, sit_usuario_id, niveis_acesso_id
                    FROM usuarios
                    WHERE niveis_acesso_id = 3
                    OR sit_usuario_id = 1";
$result_usuarios = $conn->prepare(query: $query_usuarios);
$result_usuarios->execute();

while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
   // var_dump($row_usuarioss);
   echo "id:". $row_usuarios ['id']. "<br>";
   echo "nome:". $row_usuarios ['nome']. "<br>";
   echo "email:". $row_usuarios ['email']. "<br>";
   echo "sit_usuario_id:". $row_usuarios ['sit_usuario_id']. "<br>";
   echo "niveis_acesso_id". $row_usuarios ['niveis_acesso_id']. '<br><hr>';
  
} 
echo "<br><hr>";
?> 

