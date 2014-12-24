<?php
/**
 * Always redirect direct accesses to www.phpmyfaq.de/download
 *
 *
 */

header('Location: http://www.phpmyfaq.de/download', false, 301);
exit;