function readPlainText($filename) {
    $file = fopen($filename, 'r');
    $content = fread($file, filesize($filename));
    fclose($file);
    return $content;
}