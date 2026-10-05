<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php
        session_start();
        echo "<h1>Bem-vindo, " . $_SESSION['nome'] . "!</h1>";
        ?>
    </header>

    <main>
        <h2>Lista de Livros</h2>
        <?php
        include 'conexao.php';
        $smts = $pdo->query("SELECT * FROM `livros`");
        $livros = $smts->fetchAll();

        foreach ($livros as $livro) {
            echo "<div class='livro'>";
            echo "<h3>" . $livro['Titulo'] . "</h3>";
            echo "<p>Autor: " . $livro['Autor'] . "</p>";
            echo "<img src='img/capas/" . $livro['imagem_capa'] . "' alt='" . $livro['Titulo'] . "'>";
            echo "</div>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2026 Minha Loja. Todos os direitos reservados.</p>
    </footer>
</body>
</html>