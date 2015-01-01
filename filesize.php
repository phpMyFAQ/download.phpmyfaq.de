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

$version  = filter_input(INPUT_GET, 'version', FILTER_SANITIZE_STRING);
$fileName = 'files/phpmyfaq-' . $version . '.zip';

if (preg_match('((\d+)\.(\d+)(\.\d+)?(-(beta|alpha|rc)(\d+))?)', $version) && file_exists($fileName)) {

    echo json_encode(
        [
            'phpMyFAQ ' . $version => round(filesize($fileName) / 1024 / 1024, 2)
        ]
    );

} else {

    header("HTTP/1.0 418 I'm a teapot");
    echo json_encode(
        'The greatest enemy of knowledge is not ignorance, it is the illusion of knowledge.'
    );

}

exit();