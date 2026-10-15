<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'conexao.php';
    if (isset($_GET['id_livro'])) {
        $id_livro = $_GET['id_livro'];

        // Prepare a consulta SQL para buscar os detalhes do livro
        $stmt = $pdo->prepare("SELECT * FROM livros WHERE ID_livro = :id_livro");
        $stmt->bindParam(':id_livro', $id_livro, PDO::PARAM_INT);
        $stmt->execute();

        // Verifica se o livro foi encontrado
        if ($stmt->rowCount() > 0) {
            $livro = $stmt->fetch(PDO::FETCH_ASSOC);
            // Exibe os detalhes do livro
            echo "<h1>" . htmlspecialchars($livro['Titulo']) . "</h1>";
            echo "<img src='img/capas/" . htmlspecialchars(trim($livro['imagem_capa'])) . "' alt='Capa de " . htmlspecialchars($livro['Titulo']) . "' loading='lazy'>";
            echo "<p>Autor: " . htmlspecialchars($livro['Autor']) . "</p>";
            echo "<a href='borrow.php?id_livro=" . $livro['ID_livro'] . "' class='btn-borrow'>Empréstimo</a>";
            // Adicione outros campos conforme necessário
        } else {
            echo "<p>Livro não encontrado.</p>";
        }
    } else {
        echo "<p>ID do livro não fornecido.</p>";
    }

?>
</body>
</html>


