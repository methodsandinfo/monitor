<?php
include './db.php';

$database = config_db();

if (!$database)
{
	die('Connection failed: ' . mysqli_connect_error());
}

function get_servers(mysqli $database)
{
	$servers = $database->query("SELECT * FROM Servers.Servers");
	while ($server = $servers->fetch_assoc())
	{
		$json[] = $server;
	}
	echo json_encode($json);
}

get_servers($database);
