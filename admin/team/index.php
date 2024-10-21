<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Our Team Members">
    <meta name="keywords" content="team, members, company, GreenTech">
    <meta content="GreenTech" name="author">
    <title>Our Team - GreenTech Solutions</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="../../images/favicon.ico" />

    <!-- CSS -->
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .team-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }

        .team-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .team-card:hover {
            transform: scale(1.05);
        }

        .team-member-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .team-member-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .team-member-position {
            font-size: 1rem;
            color: #777;
            margin-bottom: 15px;
        }

        .team-card a {
            text-decoration: none;
            color: #007bff;
        }

        .team-card a:hover {
            text-decoration: underline;
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
                    <li class="nav-item"><a href="team.php" class="nav-link active">Team</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Team Section Start -->
    <section class="section" id="team">
        <div class="container team-container">
            <h2 class="team-title fw-bold">Meet Our Team</h2>
            <a href="create.php" class="btn btn-primary" style="margin-bottom: 15px; ">Add team members</a>
            <div class="row">
                <?php
                    require 'team.php';
                    read_team_data($csv_team);
                ?>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

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