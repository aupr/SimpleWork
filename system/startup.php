<?php

// Load the required class
spl_autoload_register(function ($class_name) {
    if (file_exists(DIR_LIBRARY . $class_name . '.php')) {
        include_once DIR_LIBRARY . $class_name . '.php';
    } elseif (file_exists(DIR_EXTLIB . $class_name . '.php')) {
        include_once DIR_EXTLIB . $class_name . '.php';
    } else {
        foreach (glob(DIR_EXTLIB . '*' , GLOB_ONLYDIR) as $fpath) {
            if (file_exists($fpath . '/' . $class_name . '.php')) {
                include_once $fpath . '/' . $class_name . '.php';
            }
        }
    }
});

// Set the value of confuguration from target ini file
foreach(parse_ini_file(DIR_.'sw.ini') as $key=>$value) {
    ini_set($key, $value);
}

{
    // URL router object
    global $url;
    $url = new url(HTTP_SERVER);

    // Encryption manager object
    global $encryption;
    $encryption = new encryption("kdfie21s5df45ghjgfjgfhj");

    // Database manager object
    global $db;
    $db = new db(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_PREFIX.DB_DATABASE, DB_PORT);

    // Cache manager object
    global $cache;
    $cache = new cache('file',3600);

    // Cookie manager object
    global $cookie;
    $cookie = new cookie(ADIR);

    // Session manager object
    global $session;
    $session = new session('native', ADIR);

    // Mail sender object
    global  $mail;
    $email = new mail();

    // Log manager object
    global $error_log;
    global $query_log;
    $error_log = new log(DIR_LOGS, 'error.log');
    $query_log = new log(DIR_LOGS, 'query.log');
}

// Including the layout files
foreach (glob(DIR_LAYOUT . '*' , GLOB_ONLYDIR) as $fpath) {
    foreach (glob($fpath . '/*.php', GLOB_NOSORT) as $file) {
        require_once $file;
    }
}

// Including the security layout file
if (file_exists(DIR_LAYOUT . 'access.php')) {
    include_once DIR_LAYOUT . 'access.php';
} else {
    throw new \Exception("Error: Could not find the security layout file!");
}

// Default route function
function routeDefault($fname) {
    if (sizeof($ires =  glob(DIR_APPLICATION . $fname . '.*', GLOB_NOSORT))) {
        include_once $ires[0];
    } else {
        echo "Invalid application route!";
    }
}

// Route function
function start($fname){
    if (isset($_REQUEST['get'])) {
        if (sizeof($ires =  glob(DIR_TRANSFER . $_REQUEST['get'] . '.*', GLOB_NOSORT))) {
            include_once $ires[0];
        } else {
            echo '{total:0, result:0, request:0, return:0, data:0}';
        }
    } elseif (isset($_REQUEST['app'])) {
        if (sizeof($ires =  glob(DIR_APPLICATION . $_REQUEST['app'] . '.*', GLOB_NOSORT))) {
            include_once $ires[0];
        } else {
            routeDefault($fname);
        }
    }
    else {
        routeDefault($fname);
    }
}