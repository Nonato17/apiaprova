<?php
$produtos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'https://dummyjson.com/products/category/smartphones?t=' . time();
    $dados = json_decode(file_get_contents($url), true);
    $produtos = $dados['products'] ?? [];
    
    // Gera JavaScript para logar no console
    echo "<script>
        console.log('Dados carregados via PHP:');
        console.log(" . json_encode($produtos) . ");
    </script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Smartphones</title>
</head>
<body>
    <h1>Smartphones</h1>
    
    <form method="post">
        <button>Carregar Produtos</button>
    </form>

    <?php if (!empty($produtos)): ?>
        <ul>
            <?php foreach ($produtos as $p): ?>
                <li>
                    <h3><?= $p['title'] ?></h3>
                    <p>Marca: <?= $p['brand'] ?></p>
                    <p>Preço: R$ <?= number_format($p['price'], 2, ',', '.') ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>