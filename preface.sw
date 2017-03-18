<?php
// Name
define('NAME', 'SimpleWork');

// Version
define('VERSION', '1.0.0-Beta');

// Configuration
require_once('config.php');

// Library and Configuration parser
//require_once(DIR_SYSTEM . 'parser.php');

// Startup
require_once(DIR_SYSTEM . 'startup.php');

start('expose.php');