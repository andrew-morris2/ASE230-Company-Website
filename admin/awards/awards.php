<?php
    $csv_data = '../../data/awards.csv';
    function display_homepage($data){
        $fp=fopen($data, 'r');
        fgetcsv($fp);
        $i = 0;
            while ($row = fgetcsv($fp)){
                $year = $row[0];
                $award = $row[1];
                $details = $row[2];
                echo '
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($award) . '</h5>
                            <p class="card-text">Awarded in ' . htmlspecialchars($year) . '</p>
                            <!-- Three Dots Dropdown Button -->
                            <div class="dropdown">
                                <button class="dots-button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More options">
                                    &#x2022;&#x2022;&#x2022; <!-- Unicode for three dots -->
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="detail.php?award=' . urlencode($award) . '">See more</a></li>
                                    <li><a class="dropdown-item" href="edit.php?award=' . urlencode($award) . '">Edit</a></li>
                                    <li><a class="dropdown-item" href="delete.php?award=' . urlencode($award) . '">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>';
            };
        fclose($fp);
    };

    function edit_award(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $award_name = $_POST['awardName'];
            $award_year = $_POST['awardYear'];
            $award_description = $_POST['awardDescription']; //assigning values passed from edit.php
            $updatedData = [];
            $csv_file = '../../data/awards.csv';
            $fp = fopen($csv_file, 'r');
            fgetcsv($fp);
                while ($row = fgetcsv($fp)){
                    if ($row[1] == $award_name){
                        $updatedData[] = [$award_year, $award_name, $award_description];
                    } else {
                        $updatedData[] = $row;
                    }
                }
            fclose($fp);   
            
            $file_Write = fopen($csv_file, 'w');
            fputcsv($file_Write, ['Year', 'Award', 'Details']);
                foreach($updatedData as $row){
                    fputcsv($file_Write, $row);
                }
            fclose($file_Write);

            header('Location: index.php');
            exit();
        } else{
            header('Location: edit.php?error=Invalid Request');
            exit();
        }

    }

    function add_award(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $action = $_POST['action'];

            if ($action === 'add'){
                $award_name = $_POST['awardName'];
                $award_year = $_POST['awardYear'];
                $award_description = $_POST['awardDescription'];
                $data = [$award_year, $award_name, $award_description];
                $file_path = '../../data/awards.csv';
                $fp = fopen($file_path, 'a'); //opens file in append mode. 
                fputcsv($fp, $data);
                fclose($fp);

                header('Location: index.php');
                exit();
            } else {
                echo"Error handling data";
            }
        }
    }

    function delete_award(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $action = $_POST['action'];
            $csv_file = '../../data/awards.csv';
            $updatedData = [];
            if ($action === 'delete'){
                $award_name = $_POST['awardName'];
                $award_year = $_POST['awardYear'];
                $award_description = $_POST['awardDescription'];

                $fp = fopen($csv_file, 'r');
                fgetcsv($fp);
                while ($row = fgetcsv($fp)){
                    if ($row[1] != $award_name){
                        $updatedData[] = $row;
                    }
                }
                fclose($fp);

                $file_Write = fopen($csv_file, 'w');
                fputcsv($file_Write, ['Year', 'Award', 'Details']);

                foreach ($updatedData as $row){
                    fputcsv($file_Write, $row);
                }

                fclose($file_Write);

                header('Location: index.php');
                exit();
            } else {
                header('Location: index.php?error=Invalid Request');
                exit();
            }
        }
    }
?>