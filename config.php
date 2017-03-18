<?php

// HTTP
define('HTTP_SERVER', 'http://localhost/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/');

// Public Directory
define('PDIR', 'C:/xampp/htdocs/'); // '/home/ariexon/public_html'

// Application Directory
define('ADIR', 'simplework/');

// Working Directory
define('DIR_', PDIR.ADIR);

// DIR_RELATIVE_PATH
define('DIR_APPLICATION', DIR_.'application/');
define('DIR_TRANSFER', DIR_.'layout/transfer/');
define('DIR_IMAGE', DIR_.'image/');
define('DIR_FILE', DIR_.'file/');
define('DIR_SYSTEM', DIR_.'system/');
define('DIR_LAYOUT', DIR_.'layout/');
define('DIR_LIBRARY', DIR_.'system/library/');
define('DIR_EXTLIB', DIR_.'system/extlib/');
//define('DIR_SCHEME', DIR_.'system/scheme/');
define('DIR_CACHE', DIR_.'system/storage/cache/');
define('DIR_LOGS', DIR_.'system/storage/logs/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'simplework');
define('DB_PORT', '3306');
define('DB_PREFIX', '');