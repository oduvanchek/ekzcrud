<?php
require './includes/db.php';
require './includes/functions.php';

$products = fetchProducts($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? '';
    $quantity = $_POST['quantity'] ?? '';

    if (!empty($product_id) && !empty($quantity)) {
        addStock($pdo, $product_id, $quantity);
        header('Location: index.php');
        exit;
    } else {
        echo "Выберите товар и укажите количество!";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить поступление</title>
</head>
<body>
<h1>Добавить поступление товара</h1>
<form method="POST" action="add_stock.php">
    <label for="product_id">Товар:</label>
    <select id="product_id" name="product_id" required>
        <option value="">-- Выберите товар --</option>
        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>"><?= htmlspecialchars($product['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="quantity">Количество:</label>
    <input type="number" id="quantity" name="quantity" min="1" required><br><br>

    <button type="submit">Добавить поступление</button>
</form>
<br>
<a href="index.php">Вернуться на главную</a>
</body>
</html>
