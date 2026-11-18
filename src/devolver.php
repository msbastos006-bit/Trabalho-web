<?php
session_start();
include 'conexao.php';

if (isset($_GET['id_aluguel'])) {
    $id_aluguel = $_GET['id_aluguel'];

    try {
        $stmt = $pdo->prepare("DELETE FROM aluguel WHERE ID_aluguel = :id_aluguel");
        $stmt->bindParam(':id_aluguel', $id_aluguel);
        $stmt->execute();

        header("Location: perfil.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao devolver livro: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "ID do aluguel não fornecido.";
}
?>