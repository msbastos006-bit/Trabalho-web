<?php
        $con = 'mysql:host=localhost;dbname=biblioteca';
        $usuariobd = 'root';
        $senhabd = '';

try {
    $pdo = new PDO($con, $usuariobd, $senhabd);
    
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>