<?php

/**
 * 
 *
 * @author marcos
 * @since 01-11-2012
 *
 */
class SendingProcessAction extends CdtEditAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getEntity();
	 */
	protected function getEntity(){

		$cd_newsletter = CdtUtils::getParam('cd_newsletter');
		$cd_category = str_ireplace('row_cd_category_','',CdtUtils::getParam('categories'));
		$categories = explode( ",", $cd_category);
		$oSendingNewsletter = new SendingNewsletter();
		$oSendingNewsletter->setCd_newsletter($cd_newsletter);
		$dt_date = date('Ymd-H:i:s');
		$dateArray=explode ("-", $dt_date);
		$oSendingNewsletter->setDs_time($dateArray[1]);
		$oSendingNewsletter->setDt_date($dateArray[0]);
		return array("categories" => $categories, "SendingNewsletter" => $oSendingNewsletter);
			

	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$manager = new SendingNewsletterManager();
		$manager->sendingProcess($entity['SendingNewsletter'], $entity['categories']);
		$this->setDs_forward_params("id=" . $entity['SendingNewsletter']->getCd_sending_newsletter() );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return 'sending_process_success';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return 'sending_process_error';
	}


}
