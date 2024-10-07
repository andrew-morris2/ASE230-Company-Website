<?php
function readJsonFile($filePath) {
    if (!file_exists($filePath)) {
        return "File not found!";
    }

    $jsonContent = file_get_contents($filePath);

    $data = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return "Error decoding JSON: " . json_last_error_msg();
    }

    return $data;
}

$filePath = 'data.json';
$result = readJsonFile($filePath);

if (is_array($result)) {
    print_r($result); 
} else {
    echo $result; 
}
?>