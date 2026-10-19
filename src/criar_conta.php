<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteca - Criar Conta</title>
</head>
<body>
    <div class="auth-wrapper">
        <main class="auth-card">
            <div class="auth-header">
                <div class="auth-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
                <h1>Criar Conta</h1>
                <p>Preencha os dados abaixo para se cadastrar</p>
            </div>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Crie uma senha forte" required>
                </div>

                <div class="form-group">
                    <label for="confirmSenha">Confirmar Senha</label>
                    <input type="password" id="confirmSenha" name="confirmSenha" placeholder="Repita a senha" required>
                </div>

                <button type="submit" class="btn-primary">Cadastrar</button>
            </form>

            <div class="auth-footer-link">
                Já possui uma conta? <a href="index.php">Faça login</a>
            </div>
        </main>
    </div>

    <footer class="app-footer">
        <p>&copy; <?php echo date("Y"); ?> Biblioteca Universitária. Todos os direitos reservados.</p>
    </footer>
</body>
</html>


<?php
    include 'conexao.php';
// Processamento do formulário de criação de conta
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["confirmSenha"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmSenha = $_POST["confirmSenha"];

        $query = "SELECT `Email` FROM `usuario` WHERE `Email` = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $email
        ]);

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Este e-mail já está cadastrado. Por favor, use outro e-mail ou verifique se já não possui uma conta.');</script>";
            exit;
        }

    // Validação das entradas
    if ($senha !== $confirmSenha) {
        echo "<script>alert('As senhas não coincidem. Por favor, tente novamente.');</script>";
    } else{
        
        $query = "INSERT INTO `usuario`(`Nome`, `Email`, `Senha`) VALUES (':nome', ':email', ':senha')";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha
        ]);

        echo "<script>alert('Conta criada com sucesso!');</script>"; 
        $pdo->close();
    }
}
?>
