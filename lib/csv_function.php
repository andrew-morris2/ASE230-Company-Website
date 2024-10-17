<?php
    $csv_file = 'data/awards.csv';
    function read_csv_file($file){
        $fp=fopen($file, 'r'); //open csv file
        fgetcsv($fp); //Skip headers
            while ($row = fgetcsv($fp)){ //loops through rows and assigns each column to row[x]
                $year = $row[0];
                $award = $row[1];
                $details = $row[2];
                echo' 
                <div class="col-lg-3">
                    <div class="card plan-card mt-3 rounded text-center border-0 shadow overflow-hidden">
                        <div class="card-body px-3 py-5">
                            <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="circle"></i></div> -->
                            <h4 class="text-uppercase mb-3 pb-1">' . $award . '</h4>
                            <p class="text-muted">Year: <span class="fw-bold">' .$year. '</span></p>
                            <p class="text-muted font-size-14 mb-1">' . $details . '</p>
                        </div>
                    </div>
                </div>
                ';
            };
        fclose($fp); //close file
    };

    $csv_team = 'data/team.csv';
    function read_team_data($file){
        $fp=fopen($file, 'r');
        $i = 1; //this will loop through each of the members pictures
        fgetcsv($fp);
        while($row = fgetcsv($fp)){
            $member = $row[0];
            $position = $row[1];
            echo '
            <div class="col-lg col-sm-6">
                <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                    <div class="position-relative overflow-hidden">
                        <img src="images/team/' . $i . '.jpg" alt="" class="img-fluid d-block mx-auto" style="height: 325px"; />
                        <ul class="list-inline p-3 mb-0 team-social-item">
                            <li class="list-inline-item mx-3">
                                <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                            </li>
                            <li class="list-inline-item mx-3">
                                <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                            </li>
                            <li class="list-inline-item mx-3">
                                <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4">
                        <h5 class="font-size-19 mb-1">' . $member . '</h5>
                        <p class="text-muted text-uppercase font-size-14 mb-0">' . $position . '</p>
                    </div>
                </div>
            </div>';
            $i++;
        };
    };

?>

