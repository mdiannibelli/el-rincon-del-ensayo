<?php

define('server', 'localhost');
define('user', 'root');
define('password', '');
define('db_name', 'salas_db');
define('port', '3306');

$db = mysqli_connect(server, user, password, db_name, port);
if (!$db) {
  print "<h1>An error ocurred while trying to connect to the database.</h1>";
}

?>