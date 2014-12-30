<?php
/**
* Returns information of the given version as JSON
*
* Example: http://download.phpmyfaq.de/info/2.8.18
*
* Returns: { "phpMyFAQ 2.8.18": 6.1 }
*
*/

ob_start('ob_gzhandler');
header('Content-type: application/json');

$version     = filter_input(INPUT_GET, 'version', FILTER_SANITIZE_STRING);
$fileNameZip = 'files/phpmyfaq-' . $version . '.zip';
$fileNameGz  = 'files/phpmyfaq-' . $version . '.tar.gz';

if (preg_match('((\d+)\.(\d+)(\.\d+)?(-(beta|alpha|rc)(\d+))?)', $version) && file_exists($fileNameZip) && file_exists($fileNameGz)) {

    $infoData = [
        'version'  => $version,
        'zip'      => [
            'filesize' => round(filesize($fileNameZip) / 1024 / 1024, 2),
            'md5'      => md5_file($fileNameZip)
        ],
        'tar.gz'   => [
            'filesize' => round(filesize($fileNameGz) / 1024 / 1024, 2),
            'md5'      => md5_file($fileNameGz)
        ]
    ];

    echo json_encode($infoData);

} else {

    header("HTTP/1.0 418 I'm a teapot");
    echo json_encode(
        'The greatest enemy of knowledge is not ignorance, it is the illusion of knowledge.'
    );

}

exit();