<?php
return array(
	'sourcePath'  => Yii::getPathOfAlias('application.modules.chat'),
	'messagePath' => Yii::getPathOfAlias('application.modules.chat.messages'),
	'languages'   => array('ru'),
	'fileTypes'   => array(
		'php',
		'html'
	),
	'exclude'     => array(),
	'translator'  => 'Yii::t',
);