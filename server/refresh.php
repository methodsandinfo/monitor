<?php
include 'db.php';

$db = config_db();

function check($host, $id, mysqli $db)
{
	$curlInit = curl_init($host);
	curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
	curl_setopt($curlInit,CURLOPT_HEADER,true);
	curl_setopt($curlInit,CURLOPT_NOBODY,true);
	curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

	//get answer
	$response = curl_exec($curlInit);

	curl_close($curlInit);

	if($response)
	{
		$db->query('
			UPDATE Servers.Servers
			SET
				ServerWorking = 1,
			    LastUpdated = NOW()
			WHERE
				ServerID = ' . $id);
	}
	else
	{
		$db->query('
			UPDATE Servers.Servers
			SET
				ServerWorking = 0,
			    LastUpdated = NOW()
			WHERE
				ServerID = ' . $id);
	}
	$servers = $db->query('
		SELECT *
		FROM Servers.Servers
		WHERE ServerWorking = 0
	');
	Mailer::Send($servers);
}

function job(mysqli $database)
{
	$servers = $database->query("SELECT * FROM Servers.Servers");
	while ($server = $servers->fetch_assoc())
	{
		check($server['ServerAddress'], $server['ServerID'], $database);
	}
	echo 'success!';
}

job($db);
