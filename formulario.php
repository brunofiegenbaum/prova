<?php
require_once 'ClienteDAO.php';

$mensagemRetorno = "";
$nome = "";
$email = "";
$telefone = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");

    $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($nome === "" || !$emailValido || $telefone === "") {
        $mensagemRetorno = "Preencha nome, e-mail válido e telefone.";
    } else {
        $clienteDAO = new ClienteDAO();
        $clienteDAO->inserir($nome, $email, $telefone);

        $nomeSeguro = htmlspecialchars($nome);
        $mensagemRetorno = "Obrigado, $nomeSeguro! Cadastro realizado com sucesso.";

        $nome = "";
        $email = "";
        $telefone = "";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Bruno Automobilísticos</title>
    <link rel="stylesheet" href="style-php.css">
</head>
<body>
<header>
    <h1>Bruno Automobilísticos</h1>
    <p class="subtitulo">Vendemos • Compramos • Passamos a perna • Fique ligado</p>
    <img class="foto-perfil" src="foto.jpg" alt="Foto de Bruno Arthur Fiegenbaum">
</header>

<main>
    <nav>
        <a href="index.php">Home</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="sobre.php">Sobre nós</a>
        <a href="formulario.php">Entre em contato conosco</a>
    </nav>

    <section class="card">
        <h2>Cadastro de cliente</h2>

        <form action="formulario.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($telefone) ?>">

            <button type="submit">Cadastrar</button>
        </form>

        <?php if ($mensagemRetorno !== ""): ?>
            <p id="mensagem"><?= htmlspecialchars($mensagemRetorno) ?></p>
        <?php endif; ?>
    </section>

    <section class="card">
        <h2>Rede Social</h2>
        <a class="instagram" href="https://www.instagram.com/_brunognr_/" target="_blank">Instagram ↗</a>
    </section>
</main>

<footer>
    <p>© 2026 Bruno Arthur Fiegenbaum</p>
    <p>Desenvolvido com HTML, CSS e PHP.</p>
</footer>
</body>
</html>