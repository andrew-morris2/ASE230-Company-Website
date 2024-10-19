<html>
    <link rel="shortcut icon" href="../../images/favicon.ico" />

    <!-- css -->
    <link href="../../css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
</html>
<?php
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
    if(isset($csv_year) && isset($description)){
        echo '
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h1>' . $award_name . '</h1> <!-- Award title -->
                </div>
                <div class="card-body">
                    <p><strong>Year Awarded:</strong> ' . $csv_year . '</p> <!-- Year awarded -->
                    <p><strong>Description:</strong> ' . $description . '</p> <!-- Award description -->

                    <!-- Buttons to go back or edit the award -->
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Go Back</a> <!-- Go back button -->
                        <a href="edit.php?award=' . urlencode($award_name) . '" class="btn btn-primary">Edit</a> <!-- Edit button -->
                    </div>
                </div>
            </div>
        </div>';
    }
?>