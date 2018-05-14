<?php
	// Create new Notifier instance.
	$notifier = new Airbrake\Notifier(array(
	    'projectId' => 181420,
	    'projectKey' => '1c21b98ddd85427356b4ed7a68740864',
	));

	// Set global notifier instance.
	Airbrake\Instance::set($notifier);

	// Register error and exception handlers.
	$handler = new Airbrake\ErrorHandler($notifier);
	$handler->register();

	// Somewhere in the app...
	try {
	    throw new Exception('hello from phpbrake');
	} catch(Exception $e) {
	    Airbrake\Instance::notify($e);
	}
?>