<?php
//Esse comando busca as informações que estão no arquivo config.php
require 'config.php';
//Vamos criar uma variavel com um array vazio para receber os dados dos usuários
$lista = [];
//Vamos buscar os usuários no banco de dados
$sql = $pdo->query("SELECT * FROM usuarios");
//Vamos iniciar com uma validação, se existe usuarios cadastrados
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php">Adicionar Usuário</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <!--Agora vamos montar o restante da tabela com informações do BD-->
    <?php foreach($lista as $usuario): ?>
            <tr>
                <td><?=$usuario['id'];?></td>
                <td><?=$usuario['nome'];?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td>
                    <a href="editar.php?id=<?=$usuario['id'];?>">[ Editar ]</a>
                    <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Você tem certeza que deseja excluir esse usuário?')">[ Excluir ]</a>
                </td>
            </tr>
    <?php endforeach; ?>
    
</table>
