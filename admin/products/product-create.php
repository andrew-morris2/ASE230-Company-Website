<?php
// Path to the JSON file
$jsonFilePath = '../../data/test.json';

// Function to generate a unique ID
function generateUniqueId($data) {
    $maxId = 0;
    foreach ($data['KeyProductsAndServices'] as $product) {
        $maxId = max($maxId, $product['id']);
    }
    return $maxId + 1;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $applications = $_POST['applications'] ?? [];

    if ($name && $description && !empty($applications)) {
        // Read existing JSON data  
        $jsonData = file_get_contents($jsonFilePath);
        $data = json_decode($jsonData, true);

        if (!isset($data['KeyProductsAndServices'])) {
            $data['KeyProductsAndServices'] = [];
        }

        // Process applications
        $processedApplications = [];
        foreach ($applications as $app) {
            if (!empty($app['name'])) {
                $processedApplications[] = [
                    'name' => $app['name'],
                    'description' => $app['description'],
                    'image' => $app['image'] ?? ''
                ];
            }
        }

        // Create new product array
        $newProduct = [
            'id' => (string) generateUniqueId($data),
            'name' => $name,
            'description' => $description,
            'applications' => $processedApplications
        ];

        // Add new product to the array
        $data['KeyProductsAndServices'][] = $newProduct;

        // Save updated JSON data
        file_put_contents($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));

        // Redirect to product index page
        header('Location: product-index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Create New Product - GreenTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h2>Create New Product</h2>
        <form action="product-create.php" method="post">
            <div class="form-group mb-3">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div id="applications-container">
                <h4>Applications</h4>
                <div class="application-entry mb-3">
                    <input type="text" class="form-control mb-2" name="applications[0][name]" placeholder="Application Name" required>
                    <textarea class="form-control mb-2" name="applications[0][description]" placeholder="Application Description" rows="2"></textarea>
                    <input type="text" class="form-control" name="applications[0][image]" placeholder="Image URL">
                </div>
            </div>
            <button type="button" class="btn btn-secondary mb-3" id="add-application">Add Another Application</button>
            <div>
                <button type="submit" class="btn btn-success">Create Product</button>
            </div>
        </form>
    </div>

    <script src="../../js/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let applicationCount = 1;
        document.getElementById('add-application').addEventListener('click', function() {
            const newApplicationEntry = `
                <div class="application-entry mb-3">
                    <input type="text" class="form-control mb-2" name="applications[${applicationCount}][name]" placeholder="Application Name" required>
                    <textarea class="form-control mb-2" name="applications[${applicationCount}][description]" placeholder="Application Description" rows="2"></textarea>
                    <input type="text" class="form-control" name="applications[${applicationCount}][image]" placeholder="Image URL">
                </div>
            `;
            document.getElementById('applications-container').insertAdjacentHTML('beforeend', newApplicationEntry);
            applicationCount++;
        });
    });
</script>
</body>
</html>