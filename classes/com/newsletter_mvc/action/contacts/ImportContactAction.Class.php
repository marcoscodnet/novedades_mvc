<?php

/**
 * 
 *
 * @author marcos
 * @since 23-10-2012
 *
 */
class ImportContactAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){

		//se construye el categorya modificar.
		$oCategory = new Category ( );


		$oCategory->setCd_category( CdtUtils::getParamPOST('cd_category') );


		$file = CdtUtils::getParamFILES('ds_file');
		if ($file['tmp_name']) {
			/*$dir = APP_PATH.'files/';
			if (!file_exists($dir)) mkdir($dir, 0777); 
			$new_file=str_replace(' ', '_',$file['name']);
	        if (!move_uploaded_file($file['tmp_name'], $dir.$new_file)){
	        	
	        }*/
			$fp = fopen ($file['tmp_name'],"r");
			$contacts = new ItemCollection();
			while ($data = fgetcsv ($fp, 1000, ";")) {
			    $num = count ($data);
			    if ($num==BOL_CONTACT_IMPORT_NUM_COLUMNS) {
			    	$oContact = new Contact();
			    	$oContact->setDs_name(trim($data[0]));
			    	$oContact->setDs_address(trim($data[2]));
			    	$oContact->setDs_mail(trim($data[1]));
			    	$oContact->setDs_company(trim($data[6]));
					$oContact->setDs_movil(trim($data[4]));
					$oContact->setDs_phone(trim($data[3]));    
					$oContact->setDt_birthday(BOLUtils::formatDateToPersist(trim($data[5])));    
					if (BOLUtils::validEmail($oContact->getDs_mail())) {
						$contacts->push($oContact);
					}    
					    
			    	else{
			    		BOLUtils::log_import($oContact->getDs_name().';'.$oContact->getDs_mail().'; '.BOL_MSG_EMAIL_WRONG_STATUS);
			    	}   
			    	
			    	
			    }
			    else{
			    	BOLUtils::log_import(trim($data[0]).';'.trim($data[0]).'; '.BOL_MSG_FIELDS_WRONG_STATUS);
			    }
			    	
			}
			
			
		}
		$oUser = CdtSecureUtils::getUserLogged();	
		$nameFile = date('Ymd') . '_importados_'.$oUser->getCd_user();
		if (file_exists(APP_PATH . "logs/" . $nameFile . ".log")) {
			CdtUtils::setRequestInfo("msg", "<a href='".WEB_PATH . "logs/" . $nameFile . ".log' target='_blank'>".BOL_MSG_VIEW_LOG."</a>");
		}
		
		return array("category" => $oCategory, "contacts" => $contacts);
			

	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$manager = new ContactManager();
		$manager->contactsProcess($entity['category'], $entity['contacts']);
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'add_contact_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'import_contact_error';
	}


}
