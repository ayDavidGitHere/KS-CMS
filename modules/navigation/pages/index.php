<?php
/**
 * @file navigation/pages/index.php
 * Файл используется при редактировании и выводе типов меню
 * Файл проекта kolos-cms.
 *
 * Изменен 14.01.2011
 *
 * @author blade39 <blade39@kolosstudio.ru>
 * @version 2.6
 */
/*Обязательно вставляем во все файлы для защиты от взлома*/
if( !defined('KS_ENGINE') ) {die("Hacking attempt!");}

require_once MODULES_DIR.'/main/libs/class.CModuleAdmin.php';
require_once MODULES_DIR.'/navigation/libs/class.CNav.php';

class CnavigationAIindex extends CModuleAdmin
{
	private $iCurSection;
	private $iParentId;
	private $iId;
	private $oElement;
	private $oType;

	function __construct($module='navigation',&$smarty,&$parent)
	{
		parent::__construct($module,$smarty,$parent);
		$this->oElement=new CNavElement();
		$this->oType=new CNavTypes();
		$this->iCurSection=0;
		$this->iParentId=0;
		$this->iId=0;
	}

	function EditForm($data=false)
	{
		if(!$data)
		{
			$data=array();
			$data['id']=-1;
			$data["active"] = 1;
		}
		$this->smarty->assign('data',$data);
		$this->smarty->assign('groups_list',$this->oType->GetScriptList());
		return '_edit';
	}

	function Table()
	{
		// Выборка списка результата
		$arSelect=Array('id','name','text_ident','description','script_name');
		$arSortFields=Array('id','name','text_ident','description','script_name');
		list($sOrderField,$sOrderDir)=$this->InitSort($arSortFields);
		$sNewDir=($sOrderDir=='desc')?'asc':'desc';
		$arOrder=Array($sOrderField=>$sOrderDir);
		if($arResult['ITEMS']=$this->oType->GetList($arOrder))
		{
			/* Добавляем описание скриптов генерации меню из файла menu_scripts/.description.php */
			include (MODULES_DIR . "/" . $this->module . "/menu_scripts/.description.php");
			if(is_array($arResult['ITEMS']))
			{
				foreach ($arResult['ITEMS'] as $item_key => $item)
				{
					$descr_key = $item['script_name'] . ".php";
					if (isset($arDescription[$descr_key]))
						$arResult['ITEMS'][$item_key]['script_descr'] = $arDescription[$descr_key];
				}
			}
			// Формирование данных для вывода
			$this->smarty->assign('dataList',$arResult);
			$this->smarty->assign('order',Array('newdir'=>$sNewDir,'curdir'=>$sOrderDir,'field'=>$sOrderField));
		}
		return '';
	}

	/**
	 * Метод выполняет реализацию операции сохранения данных
	 */
	function Save()
	{
		global $KS_URL;
		try
		{
			$bError=0;
			if(!preg_match('#^[a-zA-Z0-9_-а-яА-Я ]{2,}$#',$_POST['CSC_name']))
				$bError+=$this->obModules->AddNotify('NAVIGATION_MENU_TITLE_WRONG');
			if ($_POST['CSC_text_ident']=='')
			{
				$_POST['CSC_text_ident']=Translit($_POST['CSC_name']);
				$_REQUEST['CSC_text_ident']=$_POST['CSC_text_ident'];
			}
			if(!IsTextIdent($_POST['CSC_text_ident']))
				$bError+=$this->obModules->AddNotify('NAVIGATION_MENU_TEXT_IDENT_WRONG');
			if($this->oType->GetRecord(array('text_ident'=>$_POST['CSC_text_ident'])))
				$bError+=$this->obModules->AddNotify('NAVIGATION_MENU_TEXT_IDENT_ALREADY');
			if($bError==0)
			{
				$this->oType->AddFileField('img');
				$id=$this->oType->Save('CSC_',$_POST);
				$this->obModules->AddNotify('NAVIGATION_MENU_TYPE_SAVED','',NOTIFY_MESSAGE);
				if(!array_key_exists('update',$_REQUEST))
					CUrlParser::get_instance()->Redirect("/admin.php?".$KS_URL->GetUrl(Array('ACTION','type')));
				else
					CUrlParser::get_instance()->Redirect("/admin.php?".$KS_URL->GetUrl(array('ACTION','CSC_catid')).'&ACTION=edit&CSC_catid='.$id);
			}
			else
			{
				throw new CDataError('NAVIGATION_FIELDS_ERROR');
			}
		}
		catch(CError $e)
		{
			$this->smarty->assign('last_error',$e);
			$data=$this->oType->GetFromPost('CSC_',$_POST);
			return $this->EditForm($data);
		}
	}

	function ExportForm($id)
	{
		if($data=$this->oType->GetById($id))
		{
			$arResult['type']=$data;
			$arFilter=array('type_id'=>$data['id']);
			$arResult['items']=$this->oElement->GetList(false,$arFilter);
			$this->smarty->assign('export',json_encode($arResult));
			return '_export';
		}
		$this->obModules->AddNotify('NAVIGATION_MENU_TYPE_NOT_FOUND');
		return $this->Table();
	}

	function DoImport()
	{
		$KS_URL=CUrlParser::get_instance();
		if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['importCode']))
		{
			$arRequestData=json_decode($_POST['importCode'],true);
			if(is_array($arRequestData) && isset($arRequestData['type']) && is_array($arRequestData['type']))
			{
				$arType=$arRequestData['type'];
				unset($arType['id']);
				if($id=$this->oType->Save('',$arType))
				{
					if(isset($arRequestData['items']) && is_array($arRequestData['items']))
					{
						foreach($arRequestData['items'] as $arMenuItem)
						{
							unset($arMenuItem['id']);
							$arMenuItem['type_id']=$id;
							$this->oElement->Save('',$arMenuItem);
						}
					}
				}
				$this->obModules->AddNotify('NAVIGATION_TYPE_IMPORT_OK','',NOTIFY_MESSAGE);
				CUrlParser::get_instance()->Redirect("/admin.php?".$KS_URL->GetUrl(Array('ACTION')));
			}
			else
			{
				$this->obModules->AddNotify('WRONG_IMPORT_DATA');
				CUrlParser::get_instance()->Redirect("/admin.php?".$KS_URL->GetUrl(Array('ACTION')));
			}
		}
		$this->obModules->AddNotify('WRONG_IMPORT_REQUEST');
		CUrlParser::get_instance()->Redirect("/admin.php?".$KS_URL->GetUrl(Array('ACTION')));
	}


	function CommonActions()
	{
		//Обработка множественного выбора
		$arSections=$_POST['sel']['cat'];
		if (array_key_exists('comact',$_POST))
		{
			// сменить активность элементов (активировать)
			$this->oType->Update($arSections,Array('active'=>'1'));
			$this->obModules->AddNotify('NAVIGATION_MENU_TYPE_ACTIVATED','',NOTIFY_MESSAGE);
		}
		elseif (array_key_exists('comdea',$_POST))
		{
			// сменить активность элементов (деактивировать)
			$this->oType->Update($arSections,Array('active'=>'0'));
			$this->obModules->AddNotify('NAVIGATION_MENU_TYPE_DEACTIVATED','',NOTIFY_MESSAGE);
		}
		elseif (array_key_exists('comdel',$_POST))
		{
			// удалить выделенные элементы
			$this->oType->DeleteByIds($arSections);
			$this->obModules->AddNotify('NAVIGATION_MENU_TYPE_DELETED','',NOTIFY_MESSAGE);
		}
	}

	function Run()
	{
		global $KS_URL;
		if($this->obUser->GetLevel($this->module)>0) throw new CAccessError('NAVIGATION_ACCESS_DENIED');
		$sAction='';
		if(isset($_REQUEST['ACTION']))
			$sAction=$_REQUEST['ACTION'];
		$arResult=array();
		/* Определение номера текущего элемента */
		$this->iId='';
		if(isset($_REQUEST['CSC_catid']))
			$this->iId=intval($_REQUEST['CSC_catid']);
		if(array_key_exists('ACTION',$_POST)&&($_POST['ACTION']=='common'))
		{
			$this->CommonActions();
		}
		$page='';
		$data=false;
		switch($sAction)
		{
			case "edit":
				$data=$this->oType->GetById($this->iId);
			case "new":
				$page=$this->EditForm($data);
			break;
			case "export":
				$page=$this->ExportForm($this->iId);
			break;
			case "save":
				$this->Save();
			break;
			case "import":
				$page='_import';
			break;
			case "import_do":
				$page=$this->DoImport();
			break;
			case "delete":
				if($arData=$this->oType->GetById($this->iId))
				{
					$this->oType->Delete($this->iId);
					$this->obModules->AddNotify('NAVIGATION_MENU_TYPE_DELETED','',NOTIFY_MESSAGE);
					CUrlParser::get_instance()->Redirect("admin.php?".$KS_URL->GetUrl(Array('ACTION','CSC_catid')));
				}
				else
				{
					$this->obModules->AddNotify('NAVIGATION_MENU_TYPE_NOT_FOUND');
				}
			break;
			default:
				$page=$this->Table();
			break;
		}
		return '_types'.$page;
	}
}
