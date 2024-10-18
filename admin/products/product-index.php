<?php
// Path to the JSON file
$jsonFilePath = 'data/test.json';

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GreenTech - Key Products and Services</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!-- Key Products and Services Start -->
<section class="section" id="key-products">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="fw-bold">Our Key Products and Services</h2>
                <p class="text-muted">Explore our innovative solutions for a sustainable future.</p>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <?php foreach ($data['KeyProductsAndServices'] as $product): ?>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            <h6>Applications:</h6>
                            <ul>
                                <?php foreach ($product['applications'] as $application): ?>
                                    <li>
                                        <strong><?php echo htmlspecialchars($application['name']); ?></strong>: 
                                        <?php echo htmlspecialchars($application['description']); ?>
                                        <?php if (isset($application['image'])): ?>
                                            <img src="<?php echo htmlspecialchars($application['image']); ?>" alt="<?php echo htmlspecialchars($application['name']); ?>" class="img-fluid" style="max-width: 100%; height: auto;">
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- Key Products and Services End -->

<!-- Footer Start -->
<footer class="footer" style="background-image: url(images/footer-bg.png);">
    <div class="container">
        <div class="text-center mt-5">
            <p class="text-white-50 f-15 mb-0">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; GreenTech. Design By Andrew, Josh, and Eric
            </p>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- JavaScript -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>