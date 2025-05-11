<?php
date_default_timezone_set('Europe/Madrid');

$host = 'Database';
$db   = 'AppDB';
$user = 'useradmin';
$pass = 'secure1234';

$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");
if (!$conn) { die('Error de conexión'); }

$servername = gethostname();
$now        = date('Y-m-d H:i:s');

pg_query_params($conn,
    'INSERT INTO "AppTable" ("WebServer","Datetime") VALUES ($1,$2)',
    array($servername, $now)
);

$res = pg_query_params($conn,
    'SELECT COUNT(*) FROM "AppTable" WHERE "WebServer"=$1',
    array($servername)
);
$count = pg_fetch_result($res, 0, 0);

echo "<h1>¡Hola desde $servername!</h1>";
echo "<p>He respondido a <strong>$count</strong> peticiones.</p>";
?>
