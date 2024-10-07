<?php
function jsonToPhp($jsonFile) {
    $jsonData = file_get_contents($jsonFile);
    $phpArray = json_decode($jsonData, true);
    return $phpArray;
}
?>
