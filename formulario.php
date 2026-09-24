<?php
$mensagemRetorno = "";
$nome = "";
$email = "";
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $mensagem = trim($_POST["mensagem"] ?? "");

    $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($nome === "" || !$emailValido || $mensagem === "") {
        $mensagemRetorno = "Preencha nome, e-mail válido e mensagem.";
    } else {
        $nomeSeguro = htmlspecialchars($nome);
        $mensagemRetorno = "Obrigado, $nomeSeguro! Sua mensagem foi recebida.";

        $nome = "";
        $email = "";
        $mensagem = "";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Bruno Automobilísticos</title>
    <link rel="stylesheet" href="style.css">
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
        <h2>Formulário</h2>

        <form action="formulario.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem"><?= htmlspecialchars($mensagem) ?></textarea>

            <button type="submit">Enviar</button>
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