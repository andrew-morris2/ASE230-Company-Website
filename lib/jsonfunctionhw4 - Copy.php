<?php
    $file = './data/test.json';
    function jsonToPhp($jsonFile) {
        $jsonData = file_get_contents($jsonFile);
        $phpArray = json_decode($jsonData, true);
        $data = $phpArray;
        $products = $data['KeyProductsAndServices'];
        foreach($products as $product){
            $name = $product['name'];
            $descriptions = $product['description'];
            echo'
            <div class="col-lg">
                <div class="service-box text-center px-4 py-5 position-relative mb-4">
                    <div class="service-box-content p-4">
                        <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                            <i class="" data-feather="box"></i>
                        </div>
                        <h4 class="mb-3 font-size-22">' . $name . '</h4>
                        <p class="text-muted mb-0">' . $descriptions . '</p>
                    </div>
                </div>
            </div>
            ';
        };
    };

    function display_features($jsonFile){
        $jsonData = file_get_contents($jsonFile);
        $phpArray = json_decode($jsonData, true);
        $products = $phpArray['KeyProductsAndServices'];
        foreach($products as $index => $product){
            $application = $product['applications'][0];
            $appname = $application['name'];
            $appdescription = $application['description'];
            if ($index % 2 == 0){
                echo'
                <br>
                <div class="row align-items-center mb-5">
                    <div class="col-md-5 order-2 order-md-1 mt-md-0 mt-5">
                        <h2 class="mb-4">' . $appname . '</h2>
                        <p class="text-muted mb-5">' . $appdescription . '</p>
                        <a href="javascript: void(0);" class="btn btn-primary">Find out more <i class="icon-xs ms-2" data-feather="arrow-right"></i></a>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6 ms-md-auto order-1 order-md-2">
                        <div class="position-relative">
                            <div class="ms-5 features-img">
                                <img src="images/features-1.jpg" alt="" class="img-fluid d-block mx-auto rounded shadow" />
                            </div>
                            <img src="images/dot-img.png" alt="" class="dot-img-left" />
                        </div>
                    </div>
                    <!-- end col -->
                </div> 
                ';
            } else {
                echo '
                <br>
                <div class="row align-items-center section pb-0">
                    <div class="col-md-6">
                        <div class="position-relative mb-md-0 mb-5">
                            <div class="me-5 features-img">
                                <img src="images/features-2.jpg" alt="" class="img-fluid d-block mx-auto rounded shadow" />
                            </div>
                            <img src="images/dot-img.png" alt="" class="dot-img-right" />
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-5 ms-md-auto">
                        <h2 class="mb-4">' . $appname . '</h2>
                        <p class="text-muted mb-5">' . $appdescription . '</p>
                        <a href="javascript: void(0);" class="btn btn-primary">Find out more <i class="icon-xs ms-2" data-feather="arrow-right"></i></a>
                    </div>
                    <!-- end col -->
                </div>
                ';
            };
        }; 
    };
?>
