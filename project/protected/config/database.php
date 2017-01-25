<?php

// This is the database connection configuration.
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	/******* DEVELOPMENT *******/
	'connectionString' => 'mysql:host=localhost;dbname=dodmedia_bd_cacique',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	
	/******* TESTING ********/
	/*'connectionString' => 'mysql:host=localhost;dbname=dodmedia_bd_cacique',
	'emulatePrepare' => true,
	'username' => 'dodmedia_juanveg',
	'password' => '_J3L0#)T}S{7',
	'charset' => 'utf8',*/
	
);