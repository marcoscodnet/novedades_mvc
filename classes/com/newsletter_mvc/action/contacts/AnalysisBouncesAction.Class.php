<?php

/**
 * 
 *
 * @author marcos
 * @since 03-01-2013
 *
 */
class AnalysisBouncesAction extends CdtAction{


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

		$array_hards = array('5.0.0','5.1.0','5.1.1','5.1.2','5.1.4','5.1.5','5.1.6','5.1.7','5.1.8','5.2.3','5.2.4','5.3.0','5.3.2','5.3.3','5.3.4','5.4.0','5.4.1','5.4.2','5.4.3','5.4.4','5.4.6','5.4.7','5.5.0','5.5.1','5.5.2','5.5.4','5.5.5','5.6.0','5.6.1','5.6.2','5.6.3','5.6.4','5.6.5','5.7.0','5.7.1','5.7.2','5.7.3','5.7.4','5.7.5','5.7.6','5.7.7');
		$array_softs = array('5.2.0','5.2.1','5.2.2','5.3.1','5.4.5','5.5.3','4.0.0','4.1.0','4.1.1','4.1.2','4.1.3','4.1.3','4.1.4','4.1.5','4.1.6','4.1.7','4.1.8','4.2.0','4.2.1','4.2.2','4.2.3','4.2.4','4.3.0','4.3.1','4.3.2','4.3.3','4.3.4','4.3.5','4.4.0','4.4.1','4.4.2','4.4.3','4.4.4','4.4.5','4.4.6','4.4.7','4.5.0','4.5.1','4.5.2','4.5.3','4.5.4','4.5.5','4.6.0','4.6.1','4.6.2','4.6.3','4.6.4','4.6.5','4.7.0','4.7.1','4.7.2','4.7.3','4.7.4','4.7.5','4.7.6','4.7.7');
 
		$mbox = imap_open("{".CDT_POP_MAIL_HOST.":143/imap/notls}INBOX", CDT_POP_MAIL_USERNAME, CDT_POP_MAIL_PASSWORD);
		$bouncehandler = new BounceHandler();
		$bouncehandler->web_beacon_preg_1 = "/u=([0-9a-fA-F]{32})/";
		$bouncehandler->web_beacon_preg_2 = "/m=(\d*)/";
		$bouncehandler->x_header_search_1 = "X-ctnlist-suid";
		
		/*set_include_path(get_include_path() . PATH_SEPARATOR . BOL_NET_PATH);

		include('Net/SFTP.php');
		 
		$ssh = new Net_SFTP(BOL_HOST_ROOT);
		if (!$ssh->login(BOL_USER_FTP, BOL_PASS_FTP)) {
		    exit('Login Failed');
		}*/
		$contactSendingNewsletters = new ItemCollection();
		if ($handle = opendir(BOL_BOUNCE_PATH)) {
			
			/* This is the correct way to loop over the directory. */
			while (false !== ($file = readdir($handle))) {
           		if($file=='.' || $file=='..') continue;
           		//chmod(BOL_BOUNCE_PATH.$file, 0777); // let the system put it open 
		   		//$ssh->chmod(0777, BOL_BOUNCE_PATH.$file);
		   		$bounce = file_get_contents(BOL_BOUNCE_PATH.$file);
	            $multiArray = $bouncehandler->get_the_facts($bounce);
			   
	            $bounce = $bouncehandler->init_bouncehandler($bounce, 'string');
	    		list($head, $body) = preg_split("/\r\n\r\n/", $bounce, 2);
				$nu_hard = 0;
				$nu_soft = 0;
				foreach($multiArray as $the){
			        
		       		switch($the['action']){
			            case 'failed':
			                //do something
			            	if (in_array(trim($the['status']), $array_hards)){
			                	$nu_hard = 1;
			                	$bounce_string = BOL_MSG_CONTACTSENDINGNEWSLETTER_HARD;
			            	}
			            	elseif (in_array(trim($the['status']), $array_softs)){
			                	$nu_soft++;
			                	$bounce_string = BOL_MSG_CONTACTSENDINGNEWSLETTER_SOFT;
			            	}
			            	else{
			            		$nu_hard = 1;
			            		$bounce_string = BOL_MSG_CONTACTSENDINGNEWSLETTER_HARD;
			            	}
			            	
							
			                break;
			            case 'transient':
			                //do something else
			                //echo 'Rebote soft: '.$the['recipient'].'<br>';
			                //$nu_soft  = delivery_attempts($the['recipient']);
			                /*if($num_attempts  > 10){
			                    kill_him($the['recipient']);
			                }
			                else{
			                    insert_into_queue($the['recipient'], ($num_attempts+1));
			                }*/
							$nu_soft++;
							$bounce_string = BOL_MSG_CONTACTSENDINGNEWSLETTER_SOFT;
			                break;
			            case 'autoreply':
			                //do something different
			                //echo 'No es rebote: '.$the['recipient'].'<br>';
			                //postpone($the['recipient'], '7 days');
			                break;
			            default:
			                //don't do anything
			                // echo 'Nada: '.$the['recipient'].'<br>';
			                break;
			        }
			    }
			    $cd_contact_sending_newsletter = BOLUtils::between_strings($bounce,'X-Sent-Id:','X-Contact-Id:');
			    if ($cd_contact_sending_newsletter) {
			    	$oCriteria = new CdtSearchCriteria();
					$oCriteria->addFilter('CSN.cd_contact_sending_newsletter', $cd_contact_sending_newsletter, '=');
					$oContactSendingNewsletterManager = new ContactSendingNewsletterManager();
					$oContactSendingNewsletter = $oContactSendingNewsletterManager->getContactSendingNewsletter($oCriteria);
					if($oContactSendingNewsletter){
						$oContactSendingNewsletter->setDs_log('Mail: '.$the['recipient'].' - '.BOL_MSG_CONTACTSENDINGNEWSLETTER_ACTION.': '.$the['action'].' - '.BOL_MSG_STATUS_TITLE.': '.$the['status'].' - '.BOL_MSG_CONTACTSENDINGNEWSLETTER_BOUNCE.': '.$bounce_string);
				    	$oContactSendingNewsletter->setNu_hard($nu_hard);
				    	$oContactSendingNewsletter->setNu_soft($nu_soft);
				    	$contactSendingNewsletters->push($oContactSendingNewsletter);
					}
			    	
			    }
			    //BOLUtils::log_bounce($cd_contact_sending_newsletter);
				
				//jj$ssh->delete(BOL_BOUNCE_PATH.$file);	
			}
	       
		}
		closedir($handle);	
		return $contactSendingNewsletters;
	}


	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::edit();
	 */
	protected function edit( $entity ){
		$manager = new ContactSendingNewsletterManager();
		$manager->bouncesProcess($entity);
		
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardSuccess();
	 */
	protected function getForwardSuccess(){
		return '';
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtEditAction::getForwardError();
	 */
	protected function getForwardError(){
		return '';
	}


}
