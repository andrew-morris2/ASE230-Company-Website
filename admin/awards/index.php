<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>GreenTech - Awards</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Awards" />
    <meta name="keywords" content="awards, recognition" />
    <meta content="GreenTech" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="../../images/favicon.ico" />

    <!-- css -->
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <style>
    .card {
        border: 1px solid #e0e0e0; /* Light border */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Smooth animation */
        margin-bottom: 20px; /* Space between cards */
        position: relative; /* Required for absolute positioning of dots button */
        overflow: visible; /* Ensure dropdown isn't clipped */
        margin-bottom: 30px; /* Additional space below each card */
        height: 200px;
        border-color: blue;
    }

    /* Card hover effect */

    /* Card Body */
    .card-body {
        padding: 20px; /* Add padding inside the card */
        background-color: #fff; /* White background */
    }

    /* Card Title */
    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
    }

    /* Card Text */
    .card-text {
        font-size: 1rem;
        color: #666; /* Lighter color for text */
    }

    /* Dropdown Menu Styling */
    .dropdown-menu {
        z-index: 9999; /* Ensure the dropdown appears on top */
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 0.5rem; /* Space between the button and dropdown items */
        margin-left: -1rem; /* Align dropdown menu properly */
    }

    /* Dots Button Styling */
    .dots-button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.5rem;
        color: #888;
    }

    /* Add spacing for the card layout */
    .col-lg-4 {
        margin-bottom: 30px;
    }

    .dots-button:hover {
        color: #333;
    }
    .blue-button {
        background-color: #007BFF; /* Example blue color */
        color: white; /* Text color */
        padding: 12px 23px; /* Add some padding */
        border: none; /* Remove border */
        border-radius: 5px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 16px; /* Font size */
        display: inline-block; /* Make the link behave like a block element */
        transition: background-color 0.3s; /* Smooth transition for hover effect */
    }
    .blue-button:hover {
        background-color: #0056b3; /* Darker shade for hover effect */
        color: white;
    }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom" id="navbar">
        <div class="container">
            <a class="navbar-brand logo" href="../../index.php">
                <img src="../../images/greentech.jpg" alt="" class="logo-dark" height="125" width="125" />
                <img src="../../images/greentech.jpg" alt="" class="logo-light" height="50" width="50" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto navbar-center" id="navbar-navlist">
                    <li class="nav-item"><a href="../../index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="index.php" class="nav-link active">Awards</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Awards Section -->
    <section class="section" id="awards">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold">Our Awards</h2>
                    <p class="text-muted">Explore our achievements and recognitions.</p>
                </div>
                <br>
                <div>
                    <a href="create.php" class="btn btn-primary btn-custom" >Add an Award</a>
                </div>
            </div>

            <div class="row">
                <?php require 'awards.php';
                    display_homepage($csv_data);
                ?>
            </div>
        </div>
    </section>
        <br><br><br><br><br><br>
    <!-- Footer (Optional) -->
    <footer class="footer">
        <div class="container text-center" style="text-color: white;">
            <p style="text-color: white">&copy; 2024 GreenTech. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>   
</body>

</html>