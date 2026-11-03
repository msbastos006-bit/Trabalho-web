<?php

    //fazer a verificação se o usuario ja não possui um livro emprestado, caso possua, não permitir que ele faça outro empréstimo até devolver o livro atual.

    session_start();
    $id_livro = $_GET['id_livro'];
    $id_usuario = $_SESSION['id_usuario'];
    $data_emprestimo = date('Y-m-d');
    $data_devolucao = date('Y-m-d', strtotime('+15 days'));// Define a data de devolução como 15 dias após o empréstimo

    include 'conexao.php';
    try {
        $stmt = $pdo->prepare("INSERT INTO `aluguel`(`id_livro`, `id_usuario`, `data_inicio`, `data_final`) VALUES (:id_livro, :id_usuario, :data_inicio, :data_final)");
        $stmt->bindParam(':id_livro', $id_livro);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':data_inicio', $data_emprestimo);
        $stmt->bindParam(':data_final', $data_devolucao);
        $stmt->execute();

        header('Location: books.php');
        exit();
    } catch (PDOException $e) {
        echo "Erro ao registrar empréstimo: " . htmlspecialchars($e->getMessage());
    }
?>   