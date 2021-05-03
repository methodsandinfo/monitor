<?php
include 'db.php';

class Mailer
{
	public static function Send($servers)
	{
		$db = config_db();

		$subject = 'שרתים שדורשים תשומת לב';
		$message = '<b>השרתים הבאים דורשים את תשובת ליבך:</b>';
		$message .= '<ul>';
		while ($server = $servers->fetch_assoc())
		{
			$message .= '<li>' . $server['ServerName'] . '</li>';
		}
		$message .= '</ul>';

		$mails_query = $db->query('SELECT Email FROM Servers.MailList');

		while($mail = $mails_query->fetch_assoc())
		{
			mail($mail['email'], $subject, $message);
		}
	}
}
