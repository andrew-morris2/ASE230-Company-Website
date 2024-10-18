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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>GreenTech - Key Products and Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Key Products and Services" />
    <link rel="shortcut icon" href="../../images/favicon.ico" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="20">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo-dark.png" alt="" height="28" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#key-products" class="nav-link">Key Products</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section class="hero bg-center position-relative" style="background-image: url(images/hero-bg.png);" id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="font-weight-semibold mb-4">Welcome to GreenTech</h1>
                    <p class="text-muted">Explore our innovative solutions for a sustainable future.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Key Products and Services Start -->
    <section class="section" id="key-products">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold">Our Key Products and Services</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['KeyProductsAndServices'] as $product): ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <h6>Applications:</h6>
                                <ul>
                                    <?php foreach ($product['applications'] as $application): ?>
                                        <?php if (isset($application['image'])): ?>
                                            <li>
                                                <strong><?php echo htmlspecialchars($application['name']); ?></strong>: 
                                                <img src="<?php echo htmlspecialchars($application['image']); ?>" alt="<?php echo htmlspecialchars($application['name']); ?>" class="img-fluid" style="max-width: 100%; height: auto;">
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <a href="product-detail.php" class="btn btn-primary mt-3">Click to Learn More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Key Products and Services End -->

    <!-- Contact Start -->
    <section class="section" id="contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold">Get in Touch</h2>
                    <p class="text-muted">Contact us for more information.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->

    <!-- Footer Start -->
    <footer class="footer" style="background-image: url(images/footer-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-5">
                        <p class="text-white-50 f-15 mb-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; GreenTech. Design By Andrew, Josh, and Eric
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>