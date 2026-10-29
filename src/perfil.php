<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <title>Document</title>
</head>
<body>
    <h1>Meu Perfil</h1>
    <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</p>

    <?php
    include 'conexao.php';
    echo "<h2>Meus Empréstimos</h2>";
    try {
        $stmt = $pdo->prepare("SELECT aluguel.ID_emprestimo, livros.Titulo, livros.Autor, aluguel.data_inicio, aluguel.data_final FROM aluguel JOIN livros ON aluguel.ID_livro = livros.ID_livro WHERE aluguel.ID_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $_SESSION['ID_usuario']);
        $stmt->execute();
        $emprestimos = $stmt->fetchAll();

        if (!empty($emprestimos)) {
            echo "<table>";
            echo "<tr><th>Título</th><th>Autor</th><th>Data de Empréstimo</th><th>Data de Devolução</th></tr>";
            foreach ($emprestimos as $emprestimo) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($emprestimo['Titulo']) . "</td>";
                echo "<td>" . htmlspecialchars($emprestimo['Autor']) . "</td>";
                echo "<td>" . htmlspecialchars($emprestimo['data_inicio']) . "</td>";
                echo "<td>" . ($emprestimo['data_final'] ? htmlspecialchars($emprestimo['data_final']) : 'Não devolvido') . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Você não possui empréstimos registrados.</p>";
        }
    } catch (PDOException $e) {
        echo "Erro ao consultar empréstimos: " . htmlspecialchars($e->getMessage());
    }
</body>
</html>