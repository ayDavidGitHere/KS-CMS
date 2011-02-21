<?php
/**
 * @file db_structure.php
 * Файл со структурой базы данных сервера обновлений
 * Файл проекта Update Server Dev.
 * 
 * Создан 17.02.2010
 *
 * @author blade39 
 * @version 1.0 
 * @todo
 */
/*Обязательно вставляем во все файлы для защиты от взлома*/ 
if( !defined('KS_ENGINE') ) {die("Hacking attempt!");}

$arStructure=array(
	'catsubcat_links'=>array(
		'id' => array(
			'Field'	=>	'id',
			'Type'	=> 	'int(11) unsigned',
			'Null'	=>	'NO',
			'Key'	=>	'PRI',
			'Default'=>	'0', 
			'Extra'	=>	'auto_increment',
		),
		'element_id'=>array(
			'Field'=>'element_id',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'category_id'=>array(
			'Field'=>'category_id',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
	),
	'catsubcat_catsubcat'=>array(
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
		'orderation'=>array(
			'Field'=>'orderation',
			'Type'=>'int(11)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'1',
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
		'parent_id'=>array(
			'Field'=>'parent_id',
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
		'description'=>array(
			'Field'=>'description',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
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
		'access_view'=>array(
			'Field'=>'access_view',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'access_edit'=>array(
			'Field'=>'access_edit',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'1',
			'Extra'=>'',
		),
		'access_create'=>array(
			'Field'=>'access_create',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'1',
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
		'views_count'=>array(
			'Field'=>'views_count',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'deleted'=>array(
			'Field'=>'deleted',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'seo_title'=>array(
			'Field'=>'seo_title',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'seo_description'=>array(
			'Field'=>'seo_description',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'seo_keywords'=>array(
			'Field'=>'seo_keywords',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
	),
	'catsubcat_element'=>array(
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
		'orderation'=>array(
			'Field'=>'orderation',
			'Type'=>'int(11)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'1',
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
		'parent_id'=>array(
			'Field'=>'parent_id',
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
		'description'=>array(
			'Field'=>'description',
			'Type'=>'text',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
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
		'access_view'=>array(
			'Field'=>'access_view',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'access_edit'=>array(
			'Field'=>'access_edit',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'1',
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
		'views_count'=>array(
			'Field'=>'views_count',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'deleted'=>array(
			'Field'=>'deleted',
			'Type'=>'int(11) unsigned',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'0',
			'Extra'=>'',
		),
		'seo_title'=>array(
			'Field'=>'seo_title',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'seo_description'=>array(
			'Field'=>'seo_description',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
		'seo_keywords'=>array(
			'Field'=>'seo_keywords',
			'Type'=>'char(255)',
			'Null'=>'NO',
			'Key'=>'',
			'Default'=>'',
			'Extra'=>'',
		),
	),
);
?>