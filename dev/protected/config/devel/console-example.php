<?php
$yiic = '/usr/share/php/lib/yii-1.1.15.022a51/framework/yiic.php';
$yii = '/usr/share/php/lib/yii-1.1.15.022a51/framework/yii.php';

return array(
	// preloading 'log' component
	'preload'    => array('log'),

	// autoloading model and component classes
	'import'     => array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'application.extensions.*',
		'ext.mail.YiiMailMessage',
	),

	'modules'    => array(
		// uncomment the following to enable the Gii tool
		'gii'      => array(
			'class'    => 'system.gii.GiiModule',
			'password' => '1234567890',
		),
		'yiiadmin' => array(
			'password'       => '3pCBmquQygWEP7aVjSY4JtFU',
			'registerModels' => array(
				'application.models.*',
			),
			'db'             => array(
				'class'            => 'CDbConnection',
				'connectionString' => 'sqlite:protected/modules/yiiadmin/data/yiiadmin.db',
			),
		),
	),

	// application components
	'components' => array(
		'urlManager'   => array(
			'baseUrl'          => 'dev.yii-torrent',
			'urlFormat'        => 'path',
			'showScriptName'   => false,
			'useStrictParsing' => true,
		),

		'pd'           => array(
			'class' => 'application.components.PluginsDispatcher',
		),
		'db'           => array(
			'connectionString'      => 'mysql:host=localhost;dbname=yii-torrent',
			'schemaCachingDuration' => false,
			'username'              => 'root',
			'password'              => '',
			'enableParamLogging'    => true,
			'enableProfiling'       => true,
			'charset'               => 'utf8',
			'tablePrefix'           => '',
		),

		'errorHandler' => array(
			'errorAction' => 'site/error',
			'adminInfo'   => 'admin@yii-torrent.com'
		),

		'log'          => array(
			'class'  => 'CLogRouter',
			'routes' => array(
				array(
					'class'  => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				array(
					'class'    => 'CEmailLogRoute',
					'levels'   => 'error, warning',
					'emails'   => array('admin@yii-torrent.com'),
					'sentFrom' => 'error@yii-torrent.com',
					'headers'  => array(
						'Content-type: text/plain; charset="utf-8"'
					),
				),
			),
		),

		'cache'        => array(
			'class'     => 'system.caching.CDummyCache',
			'keyPrefix' => 'ts_',
		),

		'image'        => array(
			'class' => 'ext.ImageHandler.CImageHandler',
		),

		'mail'         => array(
			'class'         => 'ext.mail.YiiMail',
			'transportType' => 'php',
			'viewPath'      => 'application.views.mail',
			'logging'       => true,
			'dryRun'        => false
		),
		'config'       => array(
			'class' => 'EConfig',
			'cache' => 3600,
		),
        'redis'        => [
            'class'    => 'application.extensions.redis.ARedisConnection',
            'hostname' => 'localhost',
            'port'     => 6379,
            'database' => 2,
            'prefix'   => 'SZ:',
        ],

        'resque' => [
            'class' => 'ext.yii-resque.RResque',
            'server' => 'localhost', // Redis server address
            'port' => '6379', // Redis server port
            'database' => 3 // Redis database number
        ],
	),
);