<?php
// Path to the JSON file
$jsonFilePath = '../../data/test.json';

// Get the product ID from the URL
$productId = $_GET['id'] ?? null;

if ($productId) {
    // Read existing JSON data
    $jsonData = file_get_contents($jsonFilePath);
    $data = json_decode($jsonData, true);

    // Find and remove the product
    foreach ($data['KeyProductsAndServices'] as $key => $product) {
        if ($product['id'] === $productId) {
            unset($data['KeyProductsAndServices'][$key]);
            break;
        }
    }

    // Re-index the array
    $data['KeyProductsAndServices'] = array_values($data['KeyProductsAndServices']);

    // Save updated JSON data
    file_put_contents($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));

    // Redirect to product index page
    header('Location: product-index.php');
    exit;
} else {
    // If no ID is provided, redirect to the product index page
    header('Location: product-index.php');
    exit;
}
?>