<?php

return array(
	'driver' => 'smtp',
	'host' => 'smtp.gmail.com',
	'port' => 587,
	'from' => array('address' => 'andy.j.michels@gmail.com', 'name' => 'Andy Michels'),
	'encryption' => 'tls',
	'username' => getenv('GMAIL_USERNAME'),
	'password' => getenv('GMAIL_PASSWORD'),
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
);
