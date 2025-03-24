<?php
require 'config.php';
$info = [];
$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    //Verificação se achou algum usuário
    if($sql->rowCount() > 0){
        
        //Vai renderizar apenas o primeiro item encontrado
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: index.php");
        exit;
    }

}else{
    header("Location: index.php");
    exit;
}

?>

<h2>Editar usuário</h2>
<form method="POST" action="editar_action.php">
<!--Vamos mandar uma informação oculta via GET-->
<input type="hidden" name="id" value="<?php echo $info['id'];?>" />
<!--Aqui será o formulário de add usuário-->
    <label>
        Nome:<br />
        <input type="text" name="name" value="<?php echo $info['nome'];?>"/>
    </label><br /><br />
    <label>
        Email:<br />
        <input type="email" name="email" value="<?php echo $info['email'];?>"/>
    </label><br /><br />
    <input type="submit" value="Salvar" />
</form>