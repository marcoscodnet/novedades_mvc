<?php 

/**
 * Acci�n para editar item.
 * 
 * @author Marcos
 * @since 14/07/2015
 * 
 */
abstract class EditItemAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		
		$oItem = new Item ( );
		$oItem->setCd_item ( CdtUtils::getParamPOST('cd_item') );	
				
		$oItem->setCd_newsletter ( CdtUtils::getParamPOST('cd_newsletter') );	
		$oItem->setNu_order ( CdtUtils::getParamPOST('nu_order') );	
		$oItem->setDs_item ( CdtUtils::getParamPOST('ds_text','',false) );	
		$oItem->setDs_image ( CdtUtils::getParamPOST('ds_imageant') );
		$dir = APP_PATH.'css/images/image/'.$oItem->getCd_newsletter ().'/';
		if (!file_exists($dir)) mkdir($dir, 0777); 
		$file = CdtUtils::getParamFILES('ds_image');
		
	   // CdtUtils::logObject($file);
	    
		if ($file['tmp_name']) {
			$explode_name = explode('.', $file['name']);
            //Se valida as� y no con el mime type porque este no funciona par algunos programas
            $pos_ext = count($explode_name) - 1;
			
            $newName=$oItem->getNu_order().'.'.$explode_name[$pos_ext];
            
            BOLImageUtils::uploadImage($file['tmp_name'], $newName, $dir,280);
			
            $oItem->setDs_image ( $newName );	
		}	
		
		
		
					
		return $oItem;
	}
	
		
}
