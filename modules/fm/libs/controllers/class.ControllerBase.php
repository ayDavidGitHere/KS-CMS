<?php
/**
 * Базовый контроллер распределяет действия между контроллером, работающим с файлами и с директориями
 * @author Dmitry Konev <d.konev@kolosstudio.ru>,
 * @version 2.6
 * @since 11.01.12
 */
 
/*Обязательно вставляем во все файлы для защиты от взлома*/
if( !defined('KS_ENGINE') ) {die("Hacking attempt!");}

class ControllerBase {
	private static $obInstance;
	private $obControllerDir;
	private $obControllerFile;
	private $sAction;
	private $sType;
	private $sPath;
	
	function __construct(){
		$this->obControllerFile=new ControllerFile();
		$this->obControllerDir=new ControllerDir($this->obControllerFile);
		$this->sAction=(!empty($_REQUEST['action'])) ? strip_tags($_REQUEST['action']) : '';
		$this->sType=(!empty($_REQUEST['type'])) ? strip_tags($_REQUEST['type']) : '';
		$this->sPath=(!empty($_GET['fm_path'])) ? $_GET['fm_path'] : '';
	}
	
	static function Instance(){
		if(!self::$obInstance)
			self::$obInstance=new self();
		return self::$obInstance;
	}
	
	public function Run(){
		switch($this->sAction){
			case 'upload':
				$obView=$this->SelectController()->Upload();
			case 'delete':
				$obView=$this->SelectController()->Delete();
			case 'copy':
				$obView=$this->SelectController()->Copy($this->sPath);
			case 'cut':
				$obView=$this->SelectController()->Cut();
			case 'paste':
				$obView=$this->obControllerDir->Paste();
			case 'download':
				$obView=$this->obControllerFile->Download();
			case 'edit':
				$obView=$this->SelectController()->Edit();
			case 'open':
				$obView=$this->ControllerDir->Open($this->GetPath());
			default:
		}
	}
	
	public function SelectController(){
		if($this->sType=='dir')
			return $this->obControllerDir;
		else
			return $this->obControllerFile;
	}
}