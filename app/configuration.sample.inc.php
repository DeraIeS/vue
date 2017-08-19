<?php

// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------
// Eskimo Configuration File
// -------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------


// Error Reporting and Caching
// ----------------------------------------------------------------------------
// DEV MODE. Most errors and no caching
error_reporting( E_ALL & ~E_NOTICE & ~E_DEPRECATED );
define( 'DEV_MODE', true );
//ini_set('display_errors', 1);
// DEBUG MODE. All errors and no caching.
//error_reporting( E_ALL );
//define( 'DEV_MODE', true );
// LIVE MODE. No errors and all caching.
//error_reporting( 0 );
//define( 'DEV_MODE', false );

// Character Set and Timezone
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set('Europe/London');

// Database Connection Details
// ----------------------------------------------------------------------------
define( 'DB_HOST' , "" );
define( 'DB_NAME' , "" );
define( 'DB_USER' , "" );
define( 'DB_PASS' , "" );
define( 'PDO_DSN', "mysql:dbname=".DB_NAME.";host=".DB_HOST.";charset=UTF8");
define( 'SEQ_TABLE', "db_sequence");

// Paths
// ----------------------------------------------------------------------------
define( 'BASE_FPATH' , dirname(__DIR__).'/' );
// This should be hard coded to avoid problems when running scripts from the CLI e.g cron jobs
// e.g. https://www.mercattours.com/ or http://local.mercattours.com/
define( 'BASE_HREF', '');
