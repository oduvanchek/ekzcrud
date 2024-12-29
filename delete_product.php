<?php
require 'includes/db.php';
require 'includes/functions.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    deleteProduct($pdo, $product_id);
    header('Location: index.php');
    exit;
} else {
    echo "Неверный запрос.";
}
?>