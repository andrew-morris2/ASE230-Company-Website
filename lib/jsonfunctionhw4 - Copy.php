<?php
    $file = './data/test.json';
    function jsonToPhp($jsonFile) {
        $jsonData = file_get_contents($jsonFile);
        $phpArray = json_decode($jsonData, true);
        $data = $phpArray;
        $products = $data['KeyProductsAndServices'];
        foreach($products as $product){
            $name = $product['name'];
            echo'
            <div class="col-lg-4">
                <div class="service-box text-center px-4 py-5 position-relative mb-4">
                    <div class="service-box-content p-4">
                        <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                            <i class="" data-feather="box"></i>
                        </div>
                        <h4 class="mb-3 font-size-22">' . $name . '</h4>
                        <p class="text-muted mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis.</p>
                    </div>
                </div>
            </div>
            ';
        };
    };
?>
