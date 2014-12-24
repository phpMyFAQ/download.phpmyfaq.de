<?php
/**
 * Returns the filesize of the given version as JSON
 *
 * Example: http://download.phpmyfaq.de/filesize/2.8.18
 *
 * Returns: { "phpMyFAQ 2.8.18": 6.1 }
 *
 */

ob_start('ob_gzhandler');
header('Content-type: application/json');

$version = filter_input(INPUT_GET, 'version', FILTER_SANITIZE_STRING);

if (null === $version) {
    die('No version, no filesize');
}

echo json_encode(
    [
        'phpMyFAQ ' . $version => round(filesize('files/phpmyfaq-' . $version . '.zip') / 1024 / 1024, 2)
    ]
);
exit();