<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca - Entrar</title>
</head>
<body>
    <div class="auth-wrapper">
        <main class="auth-card">
            <div class="auth-header">
                <div class="auth-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                    </svg>
                </div>
                <h1>Biblioteca</h1>
                <p>Acesse sua conta para gerenciar empréstimos</p>
            </div>

            <form action="processar_formulario.php" method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="btn-primary">Entrar</button>
            </form>

            <div class="auth-divider">
                <span>ou</span>
            </div>

            <a href="criar_conta.php" class="btn-secondary">Criar Conta</a>
        </main>
    </div>

    <footer class="app-footer">
        <p>&copy; <?php echo date("Y"); ?> Biblioteca Universitária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>