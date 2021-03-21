<?php 

/** 
 * Manager para Contact
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param Contact $oContact entity a agregar.
	 */
	public function addContact(Contact $oContact, $categories) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ContactDAO::addContact($oContact);
		
		//eliminamos las categorias que tenía asignados.
		ContactCategoryDAO::deleteContactCategoryWithContact( $oContact );
		
		//agregamos los nuevos.
		if( !empty($categories) ){
			foreach ($categories as $oCategory) {
				
				$oContactCategory = new ContactCategory();
				$oContactCategory->setContact( $oContact );
				$oContactCategory->setCategory( $oCategory );
				
				ContactCategoryDAO::addContactCategory( $oContactCategory );
			}
		}
	}


	/**
	 * se modifica la entity
	 * @param Contact $oContact entity a modificar.
	 */
	public function updateContact(Contact $oContact, $categories) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ContactDAO::updateContact($oContact);
		
	//eliminamos las categorias que tenía asignados.
		ContactCategoryDAO::deleteContactCategoryWithContact( $oContact );
		
		//agregamos los nuevos.
		if( !empty($categories) ){
			foreach ($categories as $oCategory) {
				
				$oContactCategory = new ContactCategory();
				$oContactCategory->setContact( $oContact );
				$oContactCategory->setCategory( $oCategory );
				
				ContactCategoryDAO::addContactCategory( $oContactCategory );
			}
		}
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteContact($id) { 
		//TODO validaciones; 

		$oContact = new Contact();
		$oContact->setCd_contact($id);
		
		//eliminamos las categorias que tenía asignados.
		ContactCategoryDAO::deleteContactCategoryWithContact( $oContact );
		
		ContactDAO::deleteContact($oContact);
	}

	
	/**
	 * se obtiene una colecciï¿½n de entities dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return ItemCollection[Contact]
	 */
	public function getContacts(CdtSearchCriteria $oCriteria) { 
		return ContactDAO::getContacts($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return int
	 */
	public function getContactsCount(CdtSearchCriteria $oCriteria) { 
		return ContactDAO::getContactsCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return Contact
	 */
	public function getContact(CdtSearchCriteria $oCriteria) { 
		
		$oContact = ContactDAO::getContact($oCriteria); 
		
		if ($oContact) {
			//buscamos los artistas asociados.
	        $categories = ContactDAO::getCategories($oContact->getCd_contact());
	        $oContact->setCategories($categories);
		}
		
        
         return $oContact;
		 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getContacts($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getContactsCount($oCriteria); 
	}

	public function contactsProcess(Category $oCategory, $contacts, $subscription=0) { 
		
		$sendmail=0;
		//agregamos los nuevos.
		if( !empty($contacts) ){
			foreach ($contacts as $oContact) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('ds_mail', $oContact->getDs_mail(), '=', new CdtCriteriaFormatStringValue());
				$oContactNew = $this->getContact($oCriteria);
				if ($oContactNew) {
					if (!$oContactNew->getCategories()->existObjectComparator($oCategory, new CdCategoryComparator())) {
						$oContactNew->getCategories()->push($oCategory);
						$oContactNew->setDs_mail($oContact->getDs_mail());
						if (!$subscription) {
							$oContactNew->setDs_name($oContact->getDs_name());
				    		$oContactNew->setDs_address($oContact->getDs_address());
				    		$oContactNew->setDs_company($oContact->getDs_company());
							$oContactNew->setDs_movil($oContact->getDs_movil());
							$oContactNew->setDs_phone($oContact->getDs_phone());    
							$oContactNew->setDt_birthday($oContact->getDt_birthday());
						}
						   
						$this->updateContact($oContactNew, $oContactNew->getCategories());
						$oContact=$oContactNew;
						if ($subscription) {
							CdtUtils::setRequestInfo("msg", BOL_MSG_SUBSCRIPTION_SUCCESSFUL);
							$sendmail=1;
						}
						else 
							BOLUtils::log_import($oContact->getDs_name().';'.$oContact->getDs_mail().'; '.BOL_MSG_UPDATED_STATUS);
					}
					else {
						if ($subscription) {
							CdtUtils::setRequestInfo("msg", BOL_MSG_SUBSCRIPTION_ALREADY);
						}
						else 
							BOLUtils::log_import($oContact->getDs_name().';'.$oContact->getDs_mail().'; '.BOL_MSG_EXIST_CATEGORY_STATUS);
					}
				}
				else {
					$oContact->getCategories()->push($oCategory);
					$oContact->setBl_signed(1);
					$this->addContact($oContact, $oContact->getCategories());
					if ($subscription) {
							CdtUtils::setRequestInfo("msg", BOL_MSG_SUBSCRIPTION_SUCCESSFUL);
							$sendmail=1;
						}
					else 
						BOLUtils::log_import($oContact->getDs_name().';'.$oContact->getDs_mail().'; '.BOL_MSG_INSERTED_STATUS);
				}
				
			}
		}
		if ($sendmail) {
			$subject = BOL_MSG_SUBSCRIPTION_EMAIL_SUBJECT.NOMBRE_APLICACION;
			$nameTo = ($oContact->getDs_name())?$oContact->getDs_name():$oContact->getDs_mail();
			$to = $oContact->getDs_mail();
			
			$xtpl = new XTemplate( BOL_TEMPLATE_SUBSCRIPTION_EMAIL );
			$xtpl->assign ( 'welcome', BOL_MSG_SUBSCRIPTION_EMAIL_WELCOME );
			$xtpl->assign ( 'not_subscribed', BOL_MSG_SUBSCRIPTION_NOT_SUBSCRIBED );
			$xtpl->assign ( 'unsubscribe', BOL_MSG_SUBSCRIPTION_UNSUBSCRIBE );
			$xtpl->assign('web_path', WEB_PATH);
			$xtpl->parse('main');
			$msg = $xtpl->text('main');
			$params[] = NOMBRE_APLICACION;
			$params[] = $nameTo;
			$params[] = $oContact->getCd_contact();
	        $msg = CdtFormatUtils::formatMessage($msg, $params);
			
	        
	        CdtUtils::sendMail( $nameTo, $to, $subject, $msg );
		}
	}

} 
?>
