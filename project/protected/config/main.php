<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Cacique Tundama',
	'language'=>'es_CO',
	'sourceLanguage'=>'es_CO',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'asdf',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'cacique__admin',
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(
				'gii'=>'gii',
				'gii/<controller:\w+>'=>'gii/<controller>',
				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',

				'cacique__admin'=>'cacique__admin',
				'cacique__admin/<controller:\w+>'=>'cacique__admin/default/<controller>',
				'cacique__admin/<controller:\w+>/<id:\d+>'=>'cacique__admin/<controller>/view',
				'cacique__admin/<controller:\w+>/<action:\w+>'=>'cacique__admin/<controller>/<action>',
				'cacique__admin/<controller:\w+>/<action:\w+>/<id:\d+>'=>'cacique__admin/<controller>/<action>',

				'<action:\w+>'=>'site/<action>',
				'<controller:\w+>/<id:\w+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'juanv@dodmediagroup.co',
	),
);