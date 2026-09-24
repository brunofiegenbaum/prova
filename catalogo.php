<?php
$produtos = [
    [
        "nome" => "Fusque",
        "preco" => 55000.99,
        "categoria" => "Clássico",
        "descricao" => "Um fusque muito bem conservado. Conta com motor 1300 que faz 100 litros por km. Ótimo para o dia a dia.",
        "local" => "Westfália - RS"
    ],
    [
        "nome" => "Monza",
        "preco" => 0,
        "categoria" => "Sedã",
        "descricao" => "Esse é para quem gosta de levar muito atrás. Ótimo de média. Fuma um pouco e bate também, mas é um carro velho.",
        "local" => "Anta Gorda - RS"
    ],
    [
        "nome" => "Kombi",
        "preco" => 9500,
        "categoria" => "Utilitário",
        "descricao" => "Essa é para quem precisa levar os funcionários para obra. Excelente custo benefício. Às vezes pega fogo. Acompanha extintor de incêndio.",
        "local" => "Estrela - RS"
    ],
    [
        "nome" => "Santana",
        "preco" => 18900,
        "categoria" => "Sedã",
        "descricao" => "Antigo carro da polícia rodoviária. Excelente para carro fúnebre. Motor forte, confiável e econômico.",
        "local" => "Alvorada - RS",
        "imagem" => "santana.jpg.png"
    ]
];

function formatarPreco(float $preco): string
{
    if ($preco == 0) {
        return "R$ (De graça)";
    }

    return "R$ " . number_format($preco, 2, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Bruno Automobilísticos</title>
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

    <?php foreach ($produtos as $produto): ?>
        <section class="card">
            <h2><?= htmlspecialchars($produto["nome"]) ?> - <?= formatarPreco($produto["preco"]) ?></h2>
            <p><strong>Categoria:</strong> <?= htmlspecialchars($produto["categoria"]) ?></p>
            <p><?= htmlspecialchars($produto["descricao"]) ?></p>
            <p>📍 <?= htmlspecialchars($produto["local"]) ?></p>

            <?php if (isset($produto["imagem"])): ?>
                <img class="foto-carro" src="<?= htmlspecialchars($produto["imagem"]) ?>" alt="<?= htmlspecialchars($produto["nome"]) ?>">
            <?php endif; ?>
        </section>
    <?php endforeach; ?>
</main>

<footer>
    <p>© 2026 Bruno Arthur Fiegenbaum</p>
    <p>Desenvolvido com HTML, CSS e PHP.</p>
</footer>
</body>
</html>