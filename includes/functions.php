<?php
function fetchProducts($pdo) {
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addProduct($pdo, $name, $price, $sku, $brand, $warranty) {
    $stmt = $pdo->prepare("INSERT INTO products (name, price, sku, brand, warranty) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $price, $sku, $brand, $warranty]);
}

function addStock($pdo, $product_id, $quantity) {
    $stmt = $pdo->prepare("INSERT INTO stock (product_id, quantity) VALUES (?, ?)");
    $stmt->execute([$product_id, $quantity]);
}

function fetchStock($pdo) {
    $stmt = $pdo->query("SELECT s.quantity, s.timestamp, p.name FROM stock s JOIN products p ON s.product_id = p.id ORDER BY s.timestamp DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteProduct($pdo, $product_id) {
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
}
?>