<?php
$host ="localhost";
$user = "root";
$pass = "";
$dbname = "usuarios";
$port = 3306;

try{

$conn = new PDO(dsn:"mysql:host=$host;port=$port;dbname=". $dbname, username: $user, password: $pass);
echo "Conexão com o banco de dados efetuada com sucesso";
}catch (PDOException $err){
    echo "ERROR: Conexão com o banco de dados efetuada não realizada". $err -> getMessage();

}
echo "<br><hr>";
echo "<h3>Lista de úsuarios</h3>";
 $query_usuarios = "SELECT * FROM usuarios";
 $result_usuarios = $conn->prepare(query: $query_usuarios);
 $result_usuarios->execute();
 
 while ($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    // var_dump($row_usuarios);
    echo "id:". $row_usuarios ['id']. "<br>";
    echo "nome:". $row_usuarios ['nome']. "<br>";
    echo "email:". $row_usuarios ['email']. "<br>";
   echo "sit_usuario_id:". $row_usuarios ["sit_usuario_id"]."<br>";
   echo "niveis_acesso_id:". $row_usuarios ["niveis_acesso_id"]."<br>";
    echo "created:".date('d/m/y H:i:s', strtotime($row_usuarios ['created'])). "<br>";
    echo "modified:";
    if (!empty('modified')){
        echo date('d/m/Y H:i:s',strtotime($row_usuarios['modified'])).'<br>';
    }
     echo '<br><hr>';

 }
 
 
?>