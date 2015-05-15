<?php

$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("project_resource", $con);
mysql_query("SET NAMES UTF8");
$result = mysql_query("SELECT proposed_unit, count(*) FROM project_all GROUP BY proposed_unit");

$rows = array();
while($r = mysql_fetch_array($result)) {
    $row[0] = $r[0];
    $row[1] = $r[1];
    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?>