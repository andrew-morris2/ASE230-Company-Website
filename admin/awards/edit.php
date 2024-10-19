<?php
    require 'awards.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        edit_award();
    }
    if (isset($_GET['award'])) {
        $award_name = urldecode($_GET['award']);
        $csv_file = '../../data/awards.csv';
        $fp = fopen($csv_file, 'r');
        fgetcsv($fp);
            while($row = fgetcsv($fp)){
                $year = $row[0];
                $award = $row[1];
                $details = $row[2];
                if (strcasecmp($award, $award_name) == 0){
                    $csv_year = $year;
                    $description = $details;
                    break;
                };
            };
        fclose($fp);
    }
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Award - GreenTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Edit Award" />
    <meta name="keywords" content="edit, award, form" />
    <meta content="GreenTech" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="../../images/favicon.ico" />

    <!-- css -->
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the page */
        }

        .form-container {
            max-width: 600px; /* Max width for the form container */
            margin: 50px auto; /* Center the form on the page */
            padding: 20px; /* Padding around the form */
            background-color: #fff; /* White background for the form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }

        .form-title {
            text-align: center; /* Center the title */
            margin-bottom: 20px; /* Space below the title */
        }

        .form-label {
            font-weight: bold; /* Bold labels */
        }

        .form-control {
            border-radius: 5px; /* Rounded input fields */
            border: 1px solid #ced4da; /* Light border */
            transition: border-color 0.2s; /* Smooth border color change */
        }

        .form-control:focus {
            border-color: #80bdff; /* Blue border on focus */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Shadow on focus */
        }

        .btn-custom {
            width: 100%; /* Full width for the button */
            border-radius: 5px; /* Rounded corners */
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand logo" href="../../index.php">
                <img src="../../images/logo-dark.png" alt="" class="logo-dark" height="28" />
                <img src="../../images/logo-light.png" alt="" class="logo-light" height="28" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto navbar-center" id="navbar-navlist">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="awards.php" class="nav-link">Awards</a></li>
                    <li class="nav-item"><a href="edit.php" class="nav-link active">Edit Award</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Edit Award Section -->
    <section class="section" id="edit-award">
        <div class="container">
            <div class="form-container">
                <h2 class="form-title fw-bold">Edit Award</h2>
                <form action="" method="POST"> <!-- Action for form submission -->
                    <div class="mb-3">
                        <label for="awardName" class="form-label">Award Name</label>
                        <input type="text" class="form-control" id="awardName" name="awardName" value="<?php echo htmlspecialchars($award_name); ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="awardYear" class="form-label">Year Awarded</label>
                        <input type="number" class="form-control" id="awardYear" name="awardYear" value="<?php echo htmlspecialchars($csv_year); ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="awardDescription" class="form-label">Award Description</label>
                        <textarea class="form-control" id="awardDescription" name="awardDescription" rows="4" style="height: 100px;" required><?php echo htmlspecialchars($description); ?></textarea>
                    </div>
                    <input type="hidden" name="awardId" value="<?php echo htmlspecialchars($awardId); ?>" /> <!-- Hidden field for ID -->
                    <button type="submit" class="btn btn-primary btn-custom">Save Changes</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center" style="color: white;">
            <p>&copy; 2024 GreenTech. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>