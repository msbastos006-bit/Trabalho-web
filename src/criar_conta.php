<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Criar Conta</h1>
    <form action=" " method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <label for="confirmSenha">Confirmar Senha:</label>
        <input type="password" id="confirmSenha" name="confirmSenha" required>

        <button type="submit">Criar Conta</button>
    </form>

</body>
</html>


<?php
// Processamento do formulário de criação de conta
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["confirmSenha"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmSenha = $_POST["confirmSenha"];

    // Validação das entradas
    if ($senha !== $confirmSenha) {
        echo "<script>alert('As senhas não coincidem. Por favor, tente novamente.');</script>";
    } else {
        include 'conexao.php';
        $query = "INSERT INTO `usuario`(`Nome`, `Email`, `Senha`) VALUES ('$nome', '$email', '$senha')";
        $stmt = $pdo->query($query);


        echo "<script>alert('Conta criada com sucesso!');</script>"; 
        $pdo->close();
    }
}
?>
