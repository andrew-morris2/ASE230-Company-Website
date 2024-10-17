<?php
require_once 'lib/plaintext.php';

// Load product overview and features
$productOverviewContent = readPlainText('data/product_overview.txt');
$productFeaturesContent = readPlainText('data/product_features.txt');

// Decode the JSON data
$products = json_decode($jsonData, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>GreenTech - Eco-Friendly Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Eco-Friendly Products" />
    <meta name="keywords" content="eco-friendly, green products" />
    <meta content="GreenTech" name="author" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-bs-spy ="scroll" data-bs-target="#navbar" data-bs-offset="20">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">
                <img src="images/logo-dark.png" alt="" class="logo-dark" height="28" />
                <img src="images/logo-light.png" alt="" class="logo-light" height="28" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto navbar-center" id="navbar-navlist">
                    <li class="nav-item">
                        <a href="#home" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#products" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a href="#team" class="nav-link">Team</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section class="hero-3 bg-center position-relative" style="background-image: url(images/hero-3-bg.png);" id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h1 class="font-weight-semibold mb-4 hero-3-title">Welcome to GreenTech Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Product Overview Start -->
    <section class="section" id="products">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold">Our Products Overview</h2>
                    <p class="text-muted"><?php echo $productOverviewContent; ?></p>
                </div>
            </div>
            <?php foreach ($products['KeyProductsAndServices'] as $product) { ?>
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h3 class="fw-bold"><?php echo $product['name']; ?></h3>
                    <p class="text-muted"><?php echo $product['description']; ?></p>
                    <ul>
                        <?php foreach ($product['applications'] as $application) { ?>
                        <li>
                            <h4 class="fw-bold"><?php echo $application['name']; ?></h4>
                            <p class="text-muted"><?php echo $application['description']; ?></p>
                            <?php if (isset($application['image'])) { ?>
                            <img src="<?php echo $application['image']; ?>" alt="<?php echo $application['name']; ?>" />
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- Product Overview End -->

    <!-- Product Features Start -->
    <section class="section bg-light" id="features">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold">Product Features</h2>
                    <p class="text-muted"><?php echo $productFeaturesContent; ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Features End -->

    <!-- Pricing Start -->
    <section class="section" id="pricing">
        <div class="container">
            <!-- Pricing content here -->
        </div>
    </section>
    <!-- Pricing End -->

    <!-- Team Start -->
    <section class="section bg-light" id="team">
        <div class="container">
            <!-- Team content here -->
        </div>
    </section>
    <!-- Team End -->

    <!-- Contact Start -->
    <section class="section" id="contact">
        <div class="container">
            <!-- Contact content here -->
        </div>
    </section>
    <!-- Contact End -->

    <!-- Footer Start -->
    <footer class="footer" style="background-image: url(images/footer-bg.png);">
        <div class="container">
            <!-- Footer content here -->
        </div>
    </footer>
    <!-- Footer End -->

    <!-- javascript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/smooth-scroll.polyfills.min.js"></script>

    <script src="https://unpkg.com/feather-icons"></script>

    <!-- App Js -->
    <script src="js/app.js"></script>
</body>

</html>