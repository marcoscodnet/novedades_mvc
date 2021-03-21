<?php 

/**
 * Acción para editar newsletterImage.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
abstract class EditNewsletterImageAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){
		
		
		$oNewsletter = new Newsletter ( );
		
				
		$oNewsletter->setCd_newsletter ( CdtUtils::getParamPOST('cd_newsletter') );	
		$dir = APP_PATH.'css/templates/images/'.$oNewsletter->getCd_newsletter ().'/';
		if (!file_exists($dir)) mkdir($dir, 0777); 
		$file = CdtUtils::getParamFILES('img_header');
		if ($file['tmp_name']) {
			$explode_name = explode('.', $file['name']);
            //Se valida así y no con el mime type porque este no funciona par algunos programas
            $pos_ext = count($explode_name) - 1;
			
            $newName='Header.'.$explode_name[$pos_ext];
            
            BOLImageUtils::uploadImage($file['tmp_name'], $newName, $dir,734);
			
            $oNewsletter->setImg_header ( $oNewsletter->getCd_newsletter ().'/'.$newName );	
		}	
		$file = CdtUtils::getParamFILES('img_footer');
		if ($file['tmp_name']) {
			$explode_name = explode('.', $file['name']);
            //Se valida así y no con el mime type porque este no funciona par algunos programas
            $pos_ext = count($explode_name) - 1;
			
            $newName='Botton.'.$explode_name[$pos_ext];
            
            BOLImageUtils::uploadImage($file['tmp_name'], $newName, $dir,734);
			
            $oNewsletter->setImg_footer ( $oNewsletter->getCd_newsletter ().'/'.$newName );	
		}	
		
		
					
		return $oNewsletter;
	}
	
		
}
