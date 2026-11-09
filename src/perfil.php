<?php
session_start();
$nomeUsuario = isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : 'Visitante';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca - Meu Perfil</title>
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
                <a href="perfil.php" class="user-avatar">
                    <img src="img/icons/user-avatar.png" alt="Avatar do usuário" loading="lazy" width="48px" height="48px">
                </a>
                <span class="user-greeting">Bem-vindo(a), <strong><?php echo $nomeUsuario; ?></strong>!</span>
                <a href="logout.php" class="btn-logout" title="Encerrar sessão">Sair</a>
            </div>
        </div>
    </header>

    <main class="catalog-main">
        <div class="catalog-header">
            <div>
                <h2>Meu Perfil</h2>
                <p>Consulte seus empréstimos</p>
            </div>
        </div>

        <?php
        include 'conexao.php';
        try {
            $stmt = $pdo->prepare("SELECT * FROM aluguel JOIN livros ON aluguel.ID_livro = livros.ID_livro WHERE aluguel.ID_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario', $_SESSION['id_usuario']);
            $stmt->execute();       
            $alugueis = $stmt->fetchAll();
            ?>
            <p class="loans-total">Total de empréstimos: <?php echo count($alugueis); ?></p>
            <?php if (!empty($alugueis)) { ?>
                <div class="loans-table-wrapper">
                    <table class="loans-table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Data de Empréstimo</th>
                                <th>Data de Devolução</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php foreach ($alugueis as $aluguel) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($aluguel['Titulo']); ?></td>
                                <td><?php echo htmlspecialchars($aluguel['Autor']); ?></td>
                                <td><?php echo htmlspecialchars($aluguel['data_inicio']); ?></td>
                                <td><?php echo $aluguel['data_final'] ? htmlspecialchars($aluguel['data_final']) : 'Não devolvido'; ?></td>
                                <td><a class="btn-borrow" href="devolver.php?id_aluguel=<?php echo urlencode($aluguel['id_aluguel']); ?>">Devolver</a></td>
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="empty-catalog loans-empty">
                    <p>Você não possui empréstimos registrados.</p>
                </div>
            <?php }
        } catch (PDOException $e) {
            echo '<div class="empty-catalog loans-empty"><p>Erro ao consultar empréstimos: ' . htmlspecialchars($e->getMessage()) . '</p></div>';
        }
        ?>
    </main>

    <footer class="app-footer">
        <p>&copy; <?php echo date("Y"); ?> Biblioteca Universitária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>