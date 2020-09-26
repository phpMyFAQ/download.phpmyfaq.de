<?php
/**
 * Store download in database and redirect to file
 *
 *
 */

$versionNumber = filter_input(INPUT_GET, 'number', FILTER_SANITIZE_STRING);
$versionBranch = filter_input(INPUT_GET, 'version', FILTER_SANITIZE_STRING);
$extension     = filter_input(INPUT_GET, 'ext', FILTER_SANITIZE_STRING);

if (!is_null($versionBranch)) {
    $version = '.' . $versionBranch;
} else {
    $version = '';
}

switch ($extension) {
    case '.zip':
    case '.tar.gz':
        break;
    default:
        $extension = '.zip';
        break;
}

if (version_compare($versionNumber, '1.6.3', '<')) {
    $part = '.';
} else {
    $part = '-';
}

$fileName = 'files/phpmyfaq' . $part . $versionNumber . $version . $extension;

if (file_exists($fileName)) {
    header('Last-Modified: '.gmdate('D, d M Y H:i:s', filemtime($fileName)).' GMT', true, 200);
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header('Content-type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$fileName.'"');
    header("Content-Transfer-Encoding: binary");
    header('Content-Length: '.filesize($fileName));
    ob_end_flush();
    @readfile($fileName);
    exit();
} else {
    die('No file, no download');
}
