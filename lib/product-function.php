<?php
// Path to the JSON data file
$dataFile = '../data/test.json'; // Use forward slashes for paths

// Read the data from the JSON file
$jsonData = file_get_contents($dataFile);

// Decode JSON data into an associative array
$items = json_decode($jsonData, true);

// Function to get item details by name
function getItemDetails($items, $name) {
    foreach ($items['KeyProductsAndServices'] as $item) {
        if ($item['name'] === $name) { // Use $name instead of $id
            return $item;
        }
    }
    return null;
}

// Get the item name from the URL parameter
$name = isset($_GET['name']) ? $_GET['name'] : null; // Corrected to 'name'

// Debugging output
var_dump($_GET); // Check the contents of the $_GET array

// Check if the item name is valid
if (!$name) {
    echo "Error: Item name is not provided.";
    exit();
}

// Get the item details
$item = getItemDetails($items, $name);

// Check if the item exists
if (!$item) {
    echo "Error: Item not found.";
    exit();
}

// Redirect to details.php if the item is found
header("Location: ../admin/products/product-index.php?id=" . urlencode($name) . "&name=" . urlencode($item['name']) . "&description=" . urlencode($item['description']));
exit();
?>