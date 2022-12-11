<?php
/**
 * Redirect downloads
 *
 * Example:
 *
 * - https://download.phpmyfaq.de/latest/zip
 * - https://download.phpmyfaq.de/latest/tar.gz
 * - https://download.phpmyfaq.de/latest-development/zip
 * - https://download.phpmyfaq.de/latest-development/tar.gz
 */

$versions = json_decode(file_get_contents('https://api.phpmyfaq.de/versions'));
$branch   = filter_input(INPUT_GET, 'branch', FILTER_SANITIZE_ADD_SLASHES);
$ext      = filter_input(INPUT_GET, 'ext', FILTER_SANITIZE_ADD_SLASHES);

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
