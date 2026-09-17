<?php
    if (!empty($_POST ['email']) && !empty($_POST['password'])) {
        $con= 'mysql:host=localhost;dbname=biblioteca';
        $usuariobd = 'root';
        $senhabd = '';

    try {
        $conexao = new pdo ($con,$usuariobd,$senhabd);
        $query = "select * from usuario where";
        $query .= " Email = '{$_POST['email']}' ";
        $query .= " AND Senha = '{$_POST['password']}'";

        $stmt= $conexao->query($query);

        $usuario = $stmt->fetch();

            if (!empty($usuario)) {
                session_start();
                $_SESSION['nome'] = $usuario['usuario'];              
                $_SESSION['id'] = $usuario['id'];              
                header ('Location:books.php');
            }else {
                
                header ('Location:index.php');
                
            }
        } catch (PDOException $th) {
            echo 'Erro: ' . $th->getCode() . ' Mensagem: ' . $th->getMessage();
        }
}
            ?>