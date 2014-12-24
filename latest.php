<?php
/**
 * Redirect downloads
 *
 * Example:
 *
 * - http://download.phpmyfaq.de/latest/zip
 * - http://download.phpmyfaq.de/latest/tar.gz
 * - http://download.phpmyfaq.de/latest-development/zip
 * - http://download.phpmyfaq.de/latest-development/tar.gz
 */

$versions = json_decode(file_get_contents('http://api.phpmyfaq.de/versions'));
$branch   = filter_input(INPUT_GET, 'branch', FILTER_SANITIZE_STRIPPED);
$ext      = filter_input(INPUT_GET, 'ext', FILTER_SANITIZE_STRIPPED);

switch ($branch) {
    case 'development':
        header('Location: get.php?number=' . $versions->development . '&ext=' . $ext);
        break;

    case 'stable':
    default:
        header('Location: get.php?number=' . $versions->stable . '&ext=' . $ext);
        break;
}

exit();
