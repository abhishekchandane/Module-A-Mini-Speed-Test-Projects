<?php

header('Content-Type: application/json');

$pdo = new PDO(
    'mysql:host=localhost;dbname=competition',
    'root',
    'root123'
);

$productId = $_POST['product_id'] ?? 0;
$quantity = $_POST['quantity'] ?? 0;

$stmt = $pdo->prepare(
    "SELECT stock FROM C2_products WHERE id = ?"
);

$stmt->execute([$productId]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo json_encode([
        'success' => false,
        'remaining_stock' => 0
    ]);
    exit;
}

$stock = $product['stock'];

if ($stock >= $quantity) {

    $newStock = $stock - $quantity;

    $stmt = $pdo->prepare(
        "UPDATE C2_products SET stock = ? WHERE id = ?"
    );

    $stmt->execute([$newStock, $productId]);

    echo json_encode([
        'success' => true,
        'remaining_stock' => $newStock
    ]);

} else {

    echo json_encode([
        'success' => false,
        'remaining_stock' => $stock
    ]);
}