<?php

return array(
	'driver' => 'smtp',
	'host' => 'smtp.gmail.com',
	'port' => 587,
	'from' => array('address' => 'andy.j.michels@gmail.com', 'name' => 'Andy Michels'),
	'encryption' => 'tls',
	'username' => GMAIL_USERNAME,
	'password' => GMAIL_PASSWORD,
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
);
