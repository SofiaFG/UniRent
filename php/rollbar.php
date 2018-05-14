<?php

	use \Rollbar\Rollbar;
	use \Rollbar\Payload\Level;
	Rollbar::init(
		array(
			'access_token' => '9edcf88104cd4974bbdd498465bb15f4',
			'environment' => 'development'
		)
	);

	Rollbar::log(Level::info(), 'Test info message');
	throw new Exception('Test exception');

?>