<?php
/*Обязательно вставляем во все файлы для защиты от взлома*/
if( !defined('KS_ENGINE') ) {die("Hacking attempt!");}

class ControllerDir implements Controller {
	private $obFileController;
	private $obModelUploadForm;
	private $obModelDir
	private $obFile;
	
	function __construct(Controller $obControllerFile){
		global $ks_fs;
		$this->obFile=$ks_fs;
		$this->obControllerFile=$obControllerFile;
		$this->obModelDir=new ModelDir();
		$this->obModelUploadForm=new ModelUploadForm();
	}
	
	public function Open($sPath){
		$sPath=$this->ConcatPath($sPath);
		$this->obModelDir->GetData($sPath);
		return $this->obModelDir->View();
	}
	
	public function Edit(){
		throw new CFileError('FM_NO_METHOD');
	}

	public function Rename($sOldName){
		$sNewName=(!empty($_POST['new_name'])) ? $_POST['new_name'] : '';
		if(!$sOldName || $sOldName=='' || $sNewName=='')
			throw new CFileError('FM_INCORRECT_DATA');
		$this->obFile->Rename($sOldName, $sNewName);
		return $this->obModelDir->View();
	}
	
	public function Delete($sPath){
		$sPath=$this->ConcatPath($sPath);
		if( $this->obFile->Remove($sPath) ){
			return $this->obModelDir->View();
		}
		return $this->obModelDir->View();
	}
	
	public function Copy($sPath){
		$sPath=$this->GetPath().'/'.$sPath;
		Buffer::Add($sPath,'copy');
		return $this->obModelDir->View();
	}
	
	public function Cut($sPath){
		$sPath=$this->GetPath().'/'.$sPath;
		Buffer::Add($sPath,'cut');
		return $this->obModelDir->View();
	}
	
	public function Paste(){
		if($arData=Buffer::Get()){
			$sCurrentPath=$this->GetPath();
			$sMarker=(!empty($arData['marker'])) ? $arData['marker'] : 'copy';
			$bResult=$this->obFile->DirCopy($arData['data'],$sCurrentPath);
			if($bResult && $sMarker=='cut')
				$this->obFile->Remove($arData['data']);
		}
		return $this->obModelDir->View();
	}
	
	public function Upload(){
		return $this->obModelUploadForm->View();
	}
	
	public function Download(){
		throw CFileError('FM_NO_METHOD');
	}
}