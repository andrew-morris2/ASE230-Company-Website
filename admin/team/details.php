<html lang="en">

<?php
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Team Member Detail">
    <meta name="keywords" content="Team, Member, Detail, Profile">
    <meta content="GreenTech" name="author">
    <title>Team Member Detail - GreenTech Solutions</title>
    
    <!-- CSS -->
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <style>
        .profile-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-photo {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 4px solid #007bff;
        }

        .profile-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .profile-position {
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .profile-description {
            font-size: 16px;
            line-height: 1.6;
        }

        .back-btn {
            margin-top: 30px;
        }

        .btn-custom {
            border-radius: 5px;
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
                    <li class="nav-item"><a href="team.php" class="nav-link">Team</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Team Member Detail Section -->
    <section class="section" id="team-member-detail">
        <div class="container profile-container">
            <?php
                require 'team.php';
                display_details();
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center" style="color: white;">
            <p>&copy; 2024 GreenTech Solutions. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>