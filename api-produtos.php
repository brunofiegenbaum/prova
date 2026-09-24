<?php
header("Content-Type: application/json");

$produtos = [
    ["nome" => "Fusque", "preco" => 55000.99, "categoria" => "Clássico"],
    ["nome" => "Monza", "preco" => 0, "categoria" => "Sedã"],
    ["nome" => "Kombi", "preco" => 9500, "categoria" => "Utilitário"],
    ["nome" => "Santana", "preco" => 18900, "categoria" => "Sedã"]
];

echo json_encode($produtos, JSON_UNESCAPED_UNICODE);