<html>
    <?php
        $id = uniqid();
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Edit Team Member Details">
        <meta name="keywords" content="Team, Edit, Profile">
        <meta content="GreenTech" name="author">
        <title>Edit Team Member - GreenTech Solutions</title>

        <!-- CSS -->
        <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <style>
            .edit-container {
                max-width: 900px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        <!-- Edit Team Member Section -->
        <section class="section" id="edit-team-member">
            <div class="container edit-container">
                <h2>Add Team Member Details</h2>
                <form action="team.php?action=add" method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="mb-3">
                        <label for="memberName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="memberName" name="memberName" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="memberPosition" class="form-label">Position</label>
                        <input type="text" class="form-control" id="memberPosition" name="memberPosition" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="memberDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="memberDescription" name="memberDescription" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="memberImage" class="form-label">Image url</label>
                        <input type="text" class="form-control" id="memberImage" name="memberImage" value="" required>
                    </div>
                    <div>
                        <input type="hidden" id="memberID" name="memberID" value="<?php echo $id; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <div class="text-center back-btn">
                        <a href="index.php" class="btn btn-outline-primary btn-custom">Back to Team</a>
                    </div>

                </form>
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