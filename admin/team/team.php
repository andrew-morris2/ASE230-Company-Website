<?php
    $csv_team = '../../data/team.csv';
    function read_team_data($file){
        $fp=fopen($file, 'r');
        fgetcsv($fp);
        while($row = fgetcsv($fp)){
            $member = $row[0];
            $position = $row[1];
            $description = $row[2];
            $id = $row[3];
            $image = $row[4];
            echo '
            <div class="col-md-4 mb-4">
                <div class="team-card">
                    <img src="../../images/team/' . $image . '" alt="Team Member Photo" class="team-member-photo">
                    <h3 class="team-member-name">' . $member . '</h3>
                    <p class="team-member-position">' . $position . '</p>
                    <a href="details.php?id=' . $id . ' "class="btn btn-outline-primary">View Details</a>
                </div>
            </div>
            ';
            $x++;
        };
    };

    function display_details(){
        if (isset($_GET['id'])) {
            $id = urldecode($_GET['id']);
            $csv_file = '../../data/team.csv';
            $fp = fopen($csv_file, 'r');
            fgetcsv($fp);
                while($row = fgetcsv($fp)){
                    $member = $row[0];
                    $position = $row[1];
                    $description = $row[2];
                    $member_ID = $row[3];
                    $image = $row[4];
                    if (strcasecmp($member_ID, $id) == 0){
                        $csv_member = $member;
                        $csv_position = $position;
                        $csv_description = $description;
                        $csv_image = $image;
                        break;
                    };
                };
            fclose($fp);
        }
        if(isset($csv_member) && isset($csv_position) && isset($csv_description)){
            $i=1;
            echo '
            <div class="profile-header">
                <img src="../../images/team/' . $csv_image . '" alt="Team Member Photo" class="profile-photo">
                <h2 class="profile-name">' . $csv_member . '</h2>
                <p class="profile-position">' . $csv_position . '</p>
            </div>
            <div class="profile-description">
                <p>
                    ' . $csv_description . '
                </p>
            </div>
            <div class="text-center back-btn col">
                <a href="index.php" class="btn btn-outline-primary btn-custom">Back to Team</a>
                <a href="edit.php?id=' . $member_ID . '" class="btn btn-outline-primary btn-custom">Edit</a>
                <a href="delete.php?id=' . $member_ID . '"class="btn btn-outline-primary btn-custom">Delete</a>
            </div>
            ';
            $i++;
        }
    }




    //FORM HANDLING for editing, deleting, adding
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    switch($action){
        case 'edit':
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $name = $_POST['memberName'];
                $position = $_POST['memberPosition'];
                $description = $_POST['memberDescription'];
                $id = $_POST['memberID'];
                $image = $_POST['memberImage'];
                $updatedData = [];
                $csv_data = '../../data/team.csv';
                $fp=fopen($csv_data, 'r');
                fgetcsv($fp);
                    while($row = fgetcsv($fp)){
                        if($row[3] === $id){
                            $updatedData[] = [$name, $position, $description, $id, $image];
                        } else {
                            $updatedData[] = $row;
                        }
                    }
                fclose($fp);
                
                $csv_w = fopen($csv_data, 'w');
                fputcsv($csv_w, ['Member', 'Position', 'Description', 'ID', 'Image']);
                    foreach($updatedData as $row){
                        fputcsv($csv_w, $row);
                    }
                fclose($csv_w);

                header('Location: index.php');
                exit();
            } else {
                header('Location: index.php?error=Request not found');
                exit();
            }
            break;
        
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $name = $_POST['memberName'];
                $position = $_POST['memberPosition'];
                $description = $_POST['memberDescription'];
                $id = $_POST['memberID'];
                $image = $_POST['memberImage'];
                $csv_data = '../../data/team.csv';
                $newMember = [$name, $position, $description, $id, $image];

                $fp = fopen($csv_data, 'a');
                fputcsv($fp, $newMember, ',', '"');
                fclose($fp);
                header('Location: index.php');
                exit();
            } else{
                header('Location: index.php?error=Request not found');
                exit();
            }
            break;
        
        case 'delete':
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $name = $name = $_POST['memberName'];
                $position = $_POST['memberPosition'];
                $description = $_POST['memberDescription'];
                $id = $_POST['memberID'];
                $image = $_POST['memberImage'];
                $csv_data = '../../data/team.csv';

                $updatedData = [];
                $fp = fopen($csv_data, 'r');
                fgetcsv($fp);

                while($row = fgetcsv($fp)){
                    if ($row[3] != $id){
                        $updatedData[] = $row;
                    }
                }
                fclose($fp);

                $csv_w = fopen($csv_data, 'w');
                fputcsv($csv_w, ['Member', 'Position', 'Description', 'ID', 'Image']);
                foreach($updatedData as $row){
                    fputcsv($csv_w, $row);
                }

                fclose($csv_w);
                header('Location: index.php');
                exit();
            } else {
                header('Location: index.php?error=Request not found');
                exit();
            }

            break;
    }

?>