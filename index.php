<?php
require 'includes/db.php';
require 'includes/functions.php';
$products = fetchProducts($pdo);
$stockEntries = fetchStock($pdo);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Учет товаров электроники</title>
</head>
<body>
<h1>Список товаров</h1>
<table border="1">
    <thead>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Артикул</th>
        <th>Производитель</th>
        <th>Гарантия (мес)</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['price']) ?></td>
            <td><?= htmlspecialchars($product['sku']) ?></td>
            <td><?= htmlspecialchars($product['brand']) ?></td>
            <td><?= htmlspecialchars($product['warranty']) ?></td>
            <td>
                <a href="delete_product.php?id=<?= $product['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить этот товар?');">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="add_product.php">Добавить товар</a>
<a href="add_stock.php">Добавить поступление</a>

<h1>Список поступлений</h1>
<table border="1">
    <thead>
    <tr>
        <th>Название товара</th>
        <th>Количество</th>
        <th>Дата и время</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($stockEntries as $entry): ?>
        <tr>
            <td><?= htmlspecialchars($entry['name']) ?></td>
            <td><?= htmlspecialchars($entry['quantity']) ?></td>
            <td><?= htmlspecialchars($entry['timestamp']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>