<?php 

/** 
 * Manager para ContactSendingNewsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ContactSendingNewsletterManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param ContactSendingNewsletter $oContactSendingNewsletter entity a agregar.
	 */
	public function addContactSendingNewsletter(ContactSendingNewsletter $oContactSendingNewsletter) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ContactSendingNewsletterDAO::addContactSendingNewsletter($oContactSendingNewsletter);
	}


	/**
	 * se modifica la entity
	 * @param ContactSendingNewsletter $oContactSendingNewsletter entity a modificar.
	 */
	public function updateContactSendingNewsletter(ContactSendingNewsletter $oContactSendingNewsletter) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		ContactSendingNewsletterDAO::updateContactSendingNewsletter($oContactSendingNewsletter);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteContactSendingNewsletter($id) { 
		//TODO validaciones; 

		$oContactSendingNewsletter = new ContactSendingNewsletter();
		$oContactSendingNewsletter->setCd_contact_sending_newsletter($id);
		ContactSendingNewsletterDAO::deleteContactSendingNewsletter($oContactSendingNewsletter);
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[ContactSendingNewsletter]
	 */
	public function getContactSendingNewsletters(CdtSearchCriteria $oCriteria) { 
		return ContactSendingNewsletterDAO::getContactSendingNewsletters($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getContactSendingNewslettersCount(CdtSearchCriteria $oCriteria) { 
		return ContactSendingNewsletterDAO::getContactSendingNewslettersCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ContactSendingNewsletter
	 */
	public function getContactSendingNewsletter(CdtSearchCriteria $oCriteria) { 
		return ContactSendingNewsletterDAO::getContactSendingNewsletter($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getContactSendingNewsletters($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getContactSendingNewslettersCount($oCriteria); 
	}
	
	public function bouncesProcess($contactSendingNewsletters) { 
		if( !empty($contactSendingNewsletters) ){
			foreach ($contactSendingNewsletters as $oContactSendingNewsletter) {
				CdtDbManager::begin_tran();
				BOLUtils::log_bounce($oContactSendingNewsletter->getDs_log().' - ID: '.$oContactSendingNewsletter->getCd_contact_sending_newsletter());
				$this->updateContactSendingNewsletter($oContactSendingNewsletter);
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('cd_contact', $oContactSendingNewsletter->getCd_contact(), '=');
				$oContactManager = new ContactManager();
				$oContact = $oContactManager->getContact($oCriteria);
				$oContact->setNu_hard($oContactSendingNewsletter->getNu_hard());
				$oContact->setNu_soft($oContact->getNu_soft()+$oContactSendingNewsletter->getNu_soft());
				$bl_blocked = (($oContact->getNu_soft()>4) || $oContact->getNu_hard())?1:0;
				$oContact->setBl_blocked($bl_blocked);
				
				$oContactManager->updateContact($oContact, $oContact->getCategories());
				CdtDbManager::save();
			}
		}
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('CSN.bl_processed', 0, '=');
		/*$oCriteria->addFilter('CSN.nu_soft', 0, '=');
		$oCriteria->addFilter('CSN.nu_soft', 'NULL', 'is',null,'OR');
		$oCriteria->addFilter('CSN.nu_hard', 0, '=');
		$oCriteria->addFilter('CSN.nu_hard', 'NULL', 'is',null,'OR');*/
		
		$oCriteria->setExpresion( new CdtSimpleExpression("(CSN.nu_soft = 0 OR CSN.nu_soft IS NULL) AND (CSN.nu_hard = 0 OR CSN.nu_hard IS NULL) AND DATEDIFF( now( ) , CSN.dt_sent ) > ".BOL_DAYS_WITHOUT_BOUNCING ) );
		$oContactSendingNewsletterManager = new ContactSendingNewsletterManager();
		$contactSendingNewsletters = $oContactSendingNewsletterManager->getContactSendingNewsletters($oCriteria);
		foreach ($contactSendingNewsletters as $oContactSendingNewsletter) {
			CdtDbManager::begin_tran();
			$oContactSendingNewsletter->setBl_processed(1);
			$this->updateContactSendingNewsletter($oContactSendingNewsletter);
			$oCriteria2 = new CdtSearchCriteria();
			$oCriteria2->addFilter('cd_contact', $oContactSendingNewsletter->getCd_contact(), '=');
			$oContactManager = new ContactManager();
			$oContact = $oContactManager->getContact($oCriteria2);
			$oContact->setNu_hard(0);
			$oContact->setNu_soft(0);
			$oContact->setBl_blocked(0);
			$oContactManager->updateContact($oContact, $oContact->getCategories());
			CdtDbManager::save();
			
		}
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->setExpresion( new CdtSimpleExpression("(SN.cd_status = 3 OR SN.cd_status = 4 OR SN.cd_status = 5) AND DATEDIFF( now( ) , CONCAT(DATE(SN.dt_date),' ',SN.ds_time)) > 1" ) );
		$oCriteria->addGroupBy('SN.cd_sending_newsletter, SN.cd_newsletter, SN.dt_date, SN.ds_time, SN.bl_sent');
		$oSendingNewsletterManager = new SendingNewsletterManager();
		$sendingNewsletters = $oSendingNewsletterManager->getSendingNewsletters($oCriteria);
		$html='';
		foreach ($sendingNewsletters as $oSendingNewsletter) {
			$html .="<br>Envío: ".$oSendingNewsletter->getCd_sending_newsletter();
			$html .="<br>Fecha: ".$oSendingNewsletter->getDt_date().' '.$oSendingNewsletter->getDs_time();
			$html .="<br>Enviado: ".$oSendingNewsletter->getBl_sent();
			$html .="<br>Estado: ".$oSendingNewsletter->getCd_status()."<br>";
		}
		if ($html) {
			$xtpl = new XTemplate( BOL_TEMPLATE_SENDINGNEWSLETTER_PROBLEMS_MAIL);
			$xtpl->assign('app', NOMBRE_APLICACION);
			$xtpl->assign('envios', $html);
			$xtpl->parse('main');		
			$msg = $xtpl->text('main');
			
	        
	        
			BOLUtils::sendMail(NOMBRE_APLICACION, BOL_NEWSLETTER_DS_MAIL, 'Marcos Piñero', 'marcosp@codnet.com.ar', 'Envíos con problemas en '.NOMBRE_APLICACION, $msg);
		}
			
	}


} 
?>
