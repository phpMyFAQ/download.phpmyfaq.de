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

require 'config/sql.php';

try {
    $storedVersion = trim($versionNumber . ' ' . $versionBranch);
    $dsn = 'mysql:host=' . $db['server'] . ';dbname=' . $db['name'];

    $conn = new PDO($dsn, $db['user'], $db['pw']);
    $stmt = $conn->prepare('INSERT INTO phpmyfaqkunden (version) VALUES (:version)');
    $stmt->bindParam('version', $storedVersion);
    $stmt->execute();

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}

if (version_compare($versionNumber, '1.6.3', '<')) {
    $part = '.';
} else {
    $part = '-';
}

if (file_exists('files/phpmyfaq' . $part . $versionNumber . $version . $extension)) {

    header('Location: http://download.phpmyfaq.de/files/phpmyfaq' . $part . $versionNumber . $version . $extension);
    exit();

} else {

    die('No file, no download');

}