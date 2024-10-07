<?php
function readPlainText($filename) {
    if (file_exists($filename)) {
        $file = fopen($filename, 'r');
        $content = fread($file, filesize($filename));
        fclose($file);
        return $content;
    } else {
        return "File not found";
    }
}
?>