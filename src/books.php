<?php
session_start();
$nomeUsuario = isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : 'Visitante';
$idUsuario = isset($_SESSION['ID_usuario']) ? $_SESSION['ID_usuario'] : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca - Acervo de Livros</title>
</head>
<body>
    <header class="app-header">
        <div class="nav-container">
            <a href="books.php" class="brand-logo">
                <svg viewBox="0 0 24 24">
                    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                </svg>
                <span>Biblioteca</span>
            </a>
            <div class="user-nav">
                <span class="user-greeting">Bem-vindo(a), <strong><?php echo $nomeUsuario; ?></strong>!</span>
                <a href="logout.php" class="btn-logout" title="Encerrar sessão">Sair</a>
            </div>
        </div>
    </header>

    <main class="catalog-main">
        <div class="catalog-header">
            <div>
                <h2>Acervo de Livros</h2>
                <p>Consulte as obras disponíveis e solicite empréstimos</p>
            </div>
        </div>

        <div class="books-grid">
            <?php
            include 'conexao.php';
            try {
                $smts = $pdo->query("SELECT * FROM `livros`");
                $livros = $smts->fetchAll();

                if (!empty($livros)) {
                    foreach ($livros as $livro) {

                        $titulo = htmlspecialchars($livro['Titulo']);
                        $autor = htmlspecialchars($livro['Autor']);
                        $capa = !empty($livro['imagem_capa']) ? 'img/capas/' . htmlspecialchars(trim($livro['imagem_capa'])) : 'img/default-book.png';
                        
                        echo "<article class='livro'>";
                        echo "<div class='livro-cover-wrapper'>";
                        echo "<a href='book_details.php?id_livro=" . $livro['ID_livro'] . "'>";
                        echo "<img src='" . $capa . "' alt='Capa de " . $titulo . "' loading='lazy'>";
                        echo "<img src='img/esgotado-br.png' alt='Livro esgotado' loading='lazy'>";
                        echo "</a>";
                        echo "</div>";
                        echo "<div class='livro-info'>";
                        echo "<div>";
                        echo "<h3>" . $titulo . "</h3>";
                        echo "<p>Por " . $autor . "</p>";
                        echo "</div>";
                        echo "<div class='livro-actions'>";
                        echo "<a href='borrow.php?id_livro=" . $livro['ID_livro'] . "& id_usuario=" . $idUsuario . "' class='btn-borrow'>Empréstimo</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</article>";
                    }
                } else {
                    echo "<div class='empty-catalog'><p>Nenhum livro cadastrado no momento.</p></div>";
                }
            } catch (PDOException $e) {
                echo "<div class='empty-catalog'><p>Erro ao carregar o acervo: " . htmlspecialchars($e->getMessage()) . "</p></div>";
            }
            ?>
        </div>
    </main>

    <footer class="app-footer">
        <p>&copy; <?php echo date("Y"); ?> Biblioteca Universitária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>