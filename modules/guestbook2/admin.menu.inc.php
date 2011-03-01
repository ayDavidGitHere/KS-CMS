<?php
$module_name='guestbook2';
if($this->obUser->GetLevel($module_name)<=3)
{
	$this->AddMenuItem(MenuItem("GB2","GB2","module=guestbook2",$this->GetTitle($module_name),'manage_forum'));
	//Размещаем пункты модуля в меню "Форум"
	$this->AddMenuItem(
		MenuItem(
			'GB2_POSTS',
			'GUESTBOOK2',
			'module=guestbook2&page=records',
			$this->GetText('menu_messages').'&quot;'.$this->GetTitle($module_name)."&quot;",
			'item.gif',
			'GB2'),
		'GB2'
	);
	if($this->obUser->GetLevel($module_name)==0)
	{
		$this->AddMenuItem(
			MenuItem(
				"GB2_CATEGORIES",
				"GUESTBOOK2",
				"module=guestbook2&page=categories",
				$this->GetText('menu_categories')."&quot;".$this->GetTitle($module_name)."&quot;",
				'item.gif',
				'GB2'
			),
			"GB2"
		);
		$this->AddMenuItem(
			MenuItem(
				"GB2_OPTIONS",
				"GUESTBOOK2",
				"module=guestbook2&page=options",
				$this->GetText('menu_options')."&quot;".$this->GetTitle($module_name)."&quot;",
				'options.gif',
				'GB2'
			),
			"GB2"
		);
	}
}

?>