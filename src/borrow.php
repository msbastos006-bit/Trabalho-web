<?
    $id_livro = $_GET['id_livro'];
    $id_usuario = $_GET['id_usuario'];
    $data_emprestimo = now();
    $data_devolucao = null;

    include 'conexao.php';
    try {
        $stmt = $pdo->prepare("INSERT INTO `emprestimos` (ID_livro, ID_usuario, data_emprestimo, data_devolucao) VALUES (:id_livro, :id_usuario, :data_emprestimo, :data_devolucao)");
        $stmt->bindParam(':id_livro', $id_livro);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':data_emprestimo', $data_emprestimo);
        $stmt->bindParam(':data_devolucao', $data_devolucao);   
        $stmt->execute();

        header("Location: books.php?success=1");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao registrar empréstimo: " . htmlspecialchars($e->getMessage());
    }
php?>