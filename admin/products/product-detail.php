<?php
// Path to the JSON file
$jsonFilePath = '../../data/test.json';

// Check if the file exists
if (file_exists($jsonFilePath)) {
    // Read the JSON file
    $jsonData = file_get_contents($jsonFilePath);
    
    // Decode JSON to PHP array
    $data = json_decode($jsonData, true);
} else {
    // Handle the error if the file does not exist
    $data = ['KeyProductsAndServices' => []];
}

// Get the product ID from the URL
$productId = $_GET['id'] ?? null;

// Find the product by ID
$product = null;
if ($productId) {
    foreach ($data['KeyProductsAndServices'] as $item) {
        if ($item['id'] === $productId) {
            $product = $item;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo htmlspecialchars($product['name'] ?? 'Product Detail'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../images/favicon.ico" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <!-- Header and Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">GreenTech</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="../../index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="product-index.php" class="nav-link">Items</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Product Detail Section -->
    <section class="section">
        <div class="container">
            <?php if ($product): ?>
                <h2 class="fw-bold"><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo htmlspecialchars($product['description'] ?? 'No description available.'); ?></p>
                <h6>Applications:</h6>
                <ul>
                    <?php foreach ($product['applications'] as $application): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($application['name']); ?></strong>: 
                            <?php if (isset($application['image'])): ?>
                                <img src="<?php echo htmlspecialchars($application['image']); ?>" alt="<?php echo htmlspecialchars($application['name']); ?>" class="img-fluid" style="max-width: 100%; height: auto;">
                            <?php endif; ?>
                            <p><?php echo htmlspecialchars($application['description']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Product not found.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <p>&copy; <script>document.write(new Date().getFullYear())</script> GreenTech</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>