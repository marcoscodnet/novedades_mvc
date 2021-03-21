<?php 

/** 
 * Manager para Newsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class NewsletterManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param Newsletter $oNewsletter entity a agregar.
	 */
	public function addNewsletter(Newsletter $oNewsletter) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		NewsletterDAO::addNewsletter($oNewsletter);
	}


	/**
	 * se modifica la entity
	 * @param Newsletter $oNewsletter entity a modificar.
	 */
	public function updateNewsletter(Newsletter $oNewsletter) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		NewsletterDAO::updateNewsletter($oNewsletter);
	}
	

	public function updateNewsletterImages(Newsletter $oNewsletter) { 
		//TODO validaciones; 

		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_template', BOL_NEWSLETTER_CD_TEMPLATE, '=');
		
		$managerTemplate = new TemplateManager();
		$oTemplate = $managerTemplate->getTemplate( $oCriteria );
		$dir = APP_PATH.'css/templates/images/';
		
		
		$oTemplate->setImg_header($oNewsletter->getImg_header());
		$oTemplate->setImg_footer($oNewsletter->getImg_footer());
		$managerTemplate->updateTemplate($oTemplate);
		//copy($dir.$oNewsletter->getCd_newsletter().'/'.$oTemplate->getImg_header(), $dir.$oTemplate->getImg_header());
		//persistir en la bbdd.
		NewsletterDAO::updateNewsletterImages($oNewsletter);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteNewsletter($id) { 
		//TODO validaciones; 
		if (CdtUtils::getParam('anyway')) {
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter("N.cd_newsletter", $id, "=");
			$oCriteria->addGroupBy('SN.cd_sending_newsletter, SN.cd_newsletter, SN.dt_date, SN.ds_time, SN.bl_sent');
			$oManager = new SendingNewsletterManager();
			$sendingNewsletters = $oManager->getSendingNewsletters($oCriteria);
			foreach ($sendingNewsletters as $oSendingNewsletter) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter("SN.cd_sending_newsletter", $oSendingNewsletter->getCd_sending_newsletter(), "=");
				$oManager = new ContactSendingNewsletterManager();
				$contactSendingNewsletters = $oManager->getContactSendingNewsletters($oCriteria);
				foreach ($contactSendingNewsletters as $oContactSendingNewsletter) {
					ContactSendingNewsletterDAO::deleteContactSendingNewsletter($oContactSendingNewsletter);
				}
				SendingNewsletterDAO::deleteSendingNewsletter($oSendingNewsletter);
			}
			$oNewsletter = new Newsletter();
			$oNewsletter->setCd_newsletter($id);
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('I.cd_newsletter', $oNewsletter->getCd_newsletter(), '=');
			$manager = new ItemManager();
			$oItems = $manager->getItems( $oCriteria );
			foreach ($oItems as $oItem) {
				unlink(APP_PATH.'css/images/image/'.$oItem->getCd_newsletter ().'/'.$oItem->getDs_image());
				ItemDAO::deleteItem($oItem);
			}
			
			NewsletterDAO::deleteNewsletter($oNewsletter);
		}
		else{ 
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter( "SN.cd_newsletter", $id, "=" );
			$oManager = new SendingNewsletterManager();
			$count = $oManager->getSendingNewslettersCount($oCriteria);
			if( $count > 0){
				$_SESSION['remove_anyway']=1;
				$_SESSION['cd_newsletter']=$id;
			}
			else{
				$oNewsletter = new Newsletter();
				$oNewsletter->setCd_newsletter($id);
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('I.cd_newsletter', $oNewsletter->getCd_newsletter(), '=');
				$manager = new ItemManager();
				$oItems = $manager->getItems( $oCriteria );
				foreach ($oItems as $oItem) {
					unlink(APP_PATH.'css/images/image/'.$oItem->getCd_newsletter ().'/'.$oItem->getDs_image());
					ItemDAO::deleteItem($oItem);
				}
				
				NewsletterDAO::deleteNewsletter($oNewsletter);
			}
		}
	}

	
	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Newsletter]
	 */
	public function getNewsletters(CdtSearchCriteria $oCriteria) { 
		return NewsletterDAO::getNewsletters($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public function getNewslettersCount(CdtSearchCriteria $oCriteria) { 
		return NewsletterDAO::getNewslettersCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return Newsletter
	 */
	public function getNewsletter(CdtSearchCriteria $oCriteria) { 
		return NewsletterDAO::getNewsletter($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		return $this->getNewsletters($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		return $this->getNewslettersCount($oCriteria); 
	}


} 
?>
