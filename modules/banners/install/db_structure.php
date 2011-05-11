<?php
/**
 * @file tables.php
 * Файл со структурой таблиц для модуля Баннеры
 * Файл проекта kolos-cms.
 *
 * Создан 08.04.2010
 *
 * @author blade39 <blade39@kolosstudio.ru>
 * @version 2.6
 */
/*Обязательно вставляем во все файлы для защиты от взлома*/
if( !defined('KS_ENGINE') ) {die("Hacking attempt!");}

//Данные о таблицах которые нам нужны
$arStructure=array(
	'banners_types'=>array(
		'id' => array(
			'Field'	=>	'id',
			'Type'	=> 	'int(11) unsigned',
			'Null'	=>	'NO',
			'Key'	=>	'PRI',
			'Default'=>	'0',
			'Extra'	=>	'auto_increment',
		),
		'active'=>array(
			'Field'=>'active',
			'Type'=>'tinyint(1) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'text_ident'=>array(
			'Field'=>'text_ident',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'title'=>array(
			'Field'=>'title',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'icon'=>array(
			'Field'=>'icon',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'description'=>array(
			'Field'=>'description',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
	),
	'banners_clients'=>array(
		'id' => array(
			'Field'	=>	'id',
			'Type'	=> 	'int(11) unsigned',
			'Null'	=>	'NO',
			'Key'	=>	'PRI',
			'Default'=>	'0',
			'Extra'	=>	'auto_increment',
		),
		'active'=>array(
			'Field'=>'active',
			'Type'=>'tinyint(1) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'title'=>array(
			'Field'=>'title',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'description'=>array(
			'Field'=>'description',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
	),
	'banners'=>array(
		'id' => array(
			'Field'	=>	'id',
			'Type'	=> 	'int(11) unsigned',
			'Null'	=>	'NO',
			'Key'	=>	'PRI',
			'Default'=>	'0',
			'Extra'	=>	'auto_increment',
		),
		'active'=>array(
			'Field'=>'active',
			'Type'=>'tinyint(1) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'type_id'=>array(
			'Field'=>'type_id',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'client_id'=>array(
			'Field'=>'client_id',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'title'=>array(
			'Field'=>'title',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'text_ident'=>array(
			'Field'=>'text_ident',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'active_from'=>array(
			'Field'=>'active_from',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'active_to'=>array(
			'Field'=>'active_to',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'date_add'=>array(
			'Field'=>'date_add',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'date_edit'=>array(
			'Field'=>'date_edit',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'content'=>array(
			'Field'=>'content',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'img'=>array(
			'Field'=>'img',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'href'=>array(
			'Field'=>'href',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'comment'=>array(
			'Field'=>'comment',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'save_stats'=>array(
			'Field'=>'save_stats',
			'Type'=>'tinyint(1) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'show_rate'=>array(
			'Field'=>'show_rate',
			'Type'=>'int(11)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'1000',
			'Extra'=>'',
		),
	),
	'banners_links'=>array(
		'id' => array(
			'Field'	=>	'id',
			'Type'	=> 	'int(11) unsigned',
			'Null'	=>	'NO',
			'Key'	=>	'PRI',
			'Default'=>	'0',
			'Extra'	=>	'auto_increment',
		),
		'banner_id'=>array(
			'Field'=>'banner_id',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'path'=>array(
			'Field'=>'path',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'type'=>array(
			'Field'=>'type',
			'Type'=>'enum(\'inc\',\'exc\')',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'inc',
			'Extra'=>'',
		),
	),
	'banners_times'=>array(
		'id'=> array(
			'Field'	=>	'id',
			'Type'	=> 	'int(11) unsigned',
			'Null'	=>	'NO',
			'Key'	=>	'PRI',
			'Default'=>	'0',
			'Extra'	=>	'auto_increment',
		),
		'banner_id'=>array(
			'Field'=>'banner_id',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'wday'=>array(
			'Field'=>'wday',
			'Type'=>'tinyint(1) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'hour'=>array(
			'Field'=>'hour',
			'Type'=>'tinyint(2) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
	),
	'banners_hits'=>array(
		'id' => array(
			'Field'	=>	'id',
			'Type'	=> 	'int(11) unsigned',
			'Null'	=>	'NO',
			'Key'	=>	'PRI',
			'Default'=>	'0',
			'Extra'	=>	'auto_increment',
		),
		'banner_id'=>array(
			'Field'=>'banner_id',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'date'=>array(
			'Field'=>'date',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'hits'=>array(
			'Field'=>'hits',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'views'=>array(
			'Field'=>'views',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
	),
);

