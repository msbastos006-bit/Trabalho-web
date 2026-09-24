<?php
    if (!empty($_POST ['email']) && !empty($_POST['senha'])) {
        $con = 'mysql:host=localhost;dbname=biblioteca';
        $usuariobd = 'root';
        $senhabd = '';

    try {
        $conexao = new PDO ($con,$usuariobd,$senhabd);
        $query = "SELECT * FROM `usuario` WHERE `Email` = '{$_POST['email']}' AND `Senha` = '{$_POST['senha']}'";

        $stmt= $conexao->query($query);

        $usuario = $stmt->fetch();

            if (!empty($usuario)) {
                session_start();
                $_SESSION['email'] = $usuario['Email']; 
                $_SESSION['nome'] = $usuario['Nome'];                        
                header ('Location: books.php');
            }else {
                
                header ('Location: index.php');
                
            }
        } catch (PDOException $th) {
            echo 'Erro: ' . $th->getCode() . ' Mensagem: ' . $th->getMessage();
        }
}
?>