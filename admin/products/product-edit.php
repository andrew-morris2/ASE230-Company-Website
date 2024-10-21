<?php
// Path to the JSON file
$jsonFilePath = '../../data/test.json';

// Check if the file exists and read the data
if (file_exists($jsonFilePath)) {
    $jsonData = file_get_contents($jsonFilePath);
    $data = json_decode($jsonData, true);
} else {
    $data = ['KeyProductsAndServices' => []];
}

// Get the product ID from the URL
$productId = $_GET['id'] ?? null;

// Find the product by ID
$product = null;
if ($productId) {
    foreach ($data['KeyProductsAndServices'] as $key => $item) {
        if ($item['id'] === $productId) {
            $product = $item;
            $productIndex = $key;
            break;
        }
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $product) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $applications = $_POST['applications'] ?? [];

    if ($name && $description && !empty($applications)) {
        // Update the product in the data array
        $data['KeyProductsAndServices'][$productIndex] = [
            'id' => $productId,
            'name' => $name,
            'description' => $description,
            'applications' => $applications
        ];

        // Save updated JSON data
        file_put_contents($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));

        // Redirect to product detail page
        header("Location: product-detail.php?id=$productId");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Product - GreenTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <?php if ($product): ?>
            <form action="product-edit.php?id=<?php echo urlencode($productId); ?>" method="post">
                <div class="form-group mb-3">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($product['description']); ?></textarea>
                </div>
                <div id="applications-container">
                    <h4>Applications</h4>
                    <?php foreach ($product['applications'] as $index => $application): ?>
                        <div class="application-entry mb-3">
                            <input type="text" class="form-control mb-2" name="applications[<?php echo $index; ?>][name]" value="<?php echo htmlspecialchars($application['name']); ?>" placeholder="Application Name" required>
                            <textarea class="form-control mb-2" name="applications[<?php echo $index; ?>][description]" placeholder="Application Description" rows="2"><?php echo htmlspecialchars($application['description']); ?></textarea>
                            <input type="text" class="form-control mb-2" name="applications[<?php echo $index; ?>][image]" value="<?php echo htmlspecialchars($application['image']); ?>" placeholder="Image URL">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-success">Save Changes</button>
            </form>
        <?php else: ?>
            <p>Product not found.</p>
        <?php endif; ?>
        <a href="product-index.php" class="btn btn-secondary mt-3">Back to Products List</a>
    </div>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/script.min.js"></script>
    <script>
        $(document).ready(function() {
            let applicationCount = <?php echo count($product['applications']); ?>;
            $('.add-application').on('click', function() {
                const newApplication = `
                    <div class="application-entry mb-3">
                        <input type="text" class="form-control mb-2" name="applications[${applicationCount}][name]" placeholder="Application Name" required>
                        <textarea class="form-control mb-2" name="applications[${applicationCount}][description]" placeholder="Application Description" rows="2"></textarea>
                        <input type="text" class="form-control mb-2" name="applications[${applicationCount}][image]" placeholder="Image URL">
                        <button type="button" class="btn btn-danger remove-application">Remove</button>
                    </div>
                `;
                $('#applications-container').append(newApplication);
                applicationCount++;
            });

            $(document).on('click', '.remove-application', function() {
                $(this).closest('.application-entry').remove();
            });
        });
    </script>
</body>
</html>