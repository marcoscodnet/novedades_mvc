<?php

/**
 * 
 *
 * @author marcos
 * @since 01-11-2012
 *
 */
class SendNewslettersAction extends CdtAction{

	
	/**
	 * (non-PHPdoc)
	 * @see CdtAction::execute();
	 */
	public function execute(){

		//se inicia una transacci�n.
		//CdtDbManager::begin_tran();
		
		try{
			$oEntity = $this->getEntity();
			$this->edit( $oEntity );
			$forward = $this->getForwardSuccess();
			//commit de la transacci�n.
			//CdtDbManager::save();
			
		}catch(GenericException $ex){
			
			//rollback de la transacci�n.
			//CdtDbManager::undo();
			CdtUtils::setRequestError( $ex );
			$forward = $this->doForwardException( $ex, $this->getForwardError() );
			//$forward = $this->getForwardError();
		}

		return $forward;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){

		$oSendingNewsletter = null;

		//recuperamos dado su identifidor.
		$cd_sending_newsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_sending_newsletter )) {
						
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('SN.cd_sending_newsletter', $cd_sending_newsletter, '=');
			$oCriteria->addGroupBy('SN.cd_sending_newsletter, SN.cd_newsletter, SN.dt_date, SN.ds_time, SN.bl_sent');
			$manager = new SendingNewsletterManager();
			$oSendingNewsletter = $manager->getSendingNewsletter( $oCriteria );
			
		}else{
		
			$oSendingNewsletter = new SendingNewsletter();
		
		}
		return $oSendingNewsletter ;
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$manager = new SendingNewsletterManager();
		$manager->sendNewsletter($entity);
		
	}
	

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		CdtUtils::setRequestInfo("1", BOL_MSG_SENDINGNEWSLETTER_SUCCESS);
		return NULL;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		
		$ge = new GenericException( BOL_MSG_SENDINGNEWSLETTER_ERROR, 9999);
		//throw new GenericException(BOL_MSG_SENDINGNEWSLETTER_ERROR);
		CdtUtils::setRequestError($ge);
		return null;
	}


}
