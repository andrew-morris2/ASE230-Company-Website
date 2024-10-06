<?php
    $csv_file = 'lib/awards.csv';
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
?>

