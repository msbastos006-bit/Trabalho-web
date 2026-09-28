<?php
    if (!empty($_POST ['email']) && !empty($_POST['senha'])) {
    try {
        include_once 'conexao.php';
        $query = "SELECT * FROM `usuario` WHERE `Email` = '{$_POST['email']}' AND `Senha` = '{$_POST['senha']}'";

        $stmt= $pdo->query($query);

        $usuario = $stmt->fetch();

            if (!empty($usuario)) {
                session_start();
                $_SESSION['email'] = $usuario['Email']; 
                $_SESSION['nome'] = $usuario['Nome'];  

                header ('Location: books.php');
            }else {
                header ('Location: index.php');
                echo "<P style='color: red; text-align: center;'>Email ou senha incorretos. Por favor, tente novamente.</P>";
                $pdo->close();
                
            }
        } catch (PDOException $th) {
            echo 'Erro: ' . $th->getCode() . ' Mensagem: ' . $th->getMessage();
        }
}
?>