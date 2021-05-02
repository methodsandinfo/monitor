<?php
function config_db() {
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'Servers';

	$database = new mysqli($hostname, $username, $password, $db_name);

	return $database;
}
