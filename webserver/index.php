<?php
echo "WebServer ID: ";
echo gethostname();

# Configure connexion
$conn = pg_connect("host=10.2.0.10 port=5432 dbname=AppDB user=useradmin password=secure1234");

# Check connexion
if (!$conn) {
  echo "An error occurred.\n";
  exit;
}

# Prepare insert query
$hostname = gethostname();
$now = date("Y-m-d H:i:s");
$query = "INSERT INTO AppTable (WebServer, Datetime) VALUES ('$hostname', '$now')";

# Run insert query
pg_query($conn, $query);

# Run read query
$result = pg_query($conn, "SELECT COUNT(*) FROM AppTable WHERE WebServer = '$hostname'");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

# Show results
while ($row = pg_fetch_row($result)) {
  echo " - Num served requests: $row[0]";
  echo "<br />\n";
}
?>
