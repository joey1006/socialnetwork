<?php 
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','socialnetwork');

// define('DBHOST','rdbms.strato.de');
// define('DBUSER','U3227584');
// define('DBPASS','socialnetwork1');
// define('DBNAME','DB3227584');



$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($mysqli->connect_errno) {
echo "Failed to connect to MySQL:
(" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>