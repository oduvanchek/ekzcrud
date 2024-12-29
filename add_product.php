<?php
require './includes/db.php';
require './includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $sku = $_POST['sku'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $warranty = $_POST['warranty'] ?? 12;

    if (!empty($name) && !empty($price) && !empty($sku) && !empty($brand)) {
        addProduct($pdo, $name, $price, $sku, $brand, $warranty);
        header('Location: index.php');
        exit;
    } else {
        echo "Все поля обязательны для заполнения!";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
</head>
<body>
<h1>Добавить новый товар</h1>
<form method="POST" action="add_product.php">
    <label for="name">Название:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="price">Цена:</label>
    <input type="number" id="price" name="price" step="0.01" required><br><br>

    <label for="sku">Артикул:</label>
    <input type="text" id="sku" name="sku" required><br><br>

    <label for="brand">Производитель:</label>
    <input type="text" id="brand" name="brand" required><br><br>

    <label for="warranty">Гарантия (мес):</label>
    <input type="number" id="warranty" name="warranty" value="12" min="1" required><br><br>

    <button type="submit">Добавить товар</button>
</form>
<br>
<a href="index.php">Вернуться на главную</a>
</body>
</html>
