<?php 

/** 
 * Manager para SendingNewsletter
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class SendingNewsletterManager implements ICdtList{ 

	/**
	 * se agrega la nueva entity
	 * @param SendingNewsletter $oSendingNewsletter entity a agregar.
	 */
	public function addSendingNewsletter(SendingNewsletter $oSendingNewsletter) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		SendingNewsletterDAO::addSendingNewsletter($oSendingNewsletter);
	}


	/**
	 * se modifica la entity
	 * @param SendingNewsletter $oSendingNewsletter entity a modificar.
	 */
	public function updateSendingNewsletter(SendingNewsletter $oSendingNewsletter) { 
		//TODO validaciones; 

		//persistir en la bbdd.
		SendingNewsletterDAO::updateSendingNewsletter($oSendingNewsletter);
	}


	/**
	 * se elimina la entity
	 * @param int identificador de la entity a eliminar.
	 */
	public static function deleteSendingNewsletter($id) { 
		//TODO validaciones; 

		$oSendingNewsletter = new SendingNewsletter();
		$oSendingNewsletter->setCd_sending_newsletter($id);
		SendingNewsletterDAO::deleteSendingNewsletter($oSendingNewsletter);
	}

	
	/**
	 * se obtiene una colecciï¿½n de entities dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return ItemCollection[SendingNewsletter]
	 */
	public function getSendingNewsletters(CdtSearchCriteria $oCriteria) { 
		return SendingNewsletterDAO::getSendingNewsletters($oCriteria); 
	}


	/**
	 * se obtiene la cantidad de entities dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return int
	 */
	public function getSendingNewslettersCount(CdtSearchCriteria $oCriteria) { 
		return SendingNewsletterDAO::getSendingNewslettersCount($oCriteria); 
	}


	/**
	 * se obtiene un entity dado el filtro de bï¿½squeda
	 * @param CdtSearchCriteria $oCriteria filtro de bï¿½squeda.
	 * @return SendingNewsletter
	 */
	public function getSendingNewsletter(CdtSearchCriteria $oCriteria) { 
		return SendingNewsletterDAO::getSendingNewsletter($oCriteria); 
	}

	//	interface ICdtList

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntities();
	 */
	public function getEntities( CdtSearchCriteria $oCriteria) { 
		$oCriteria->addGroupBy('SN.cd_sending_newsletter, SN.cd_newsletter, SN.dt_date, SN.ds_time, SN.bl_sent');
		return $this->getSendingNewsletters($oCriteria); 
	}

	
	/**
	 * (non-PHPdoc)
	 * @see ICdtList::getEntitiesCount();
	 */
	public function getEntitiesCount ( CdtSearchCriteria $oCriteria ) { 
		//$oCriteria->addGroupBy('N.cd_newsletter');
		return $this->getSendingNewslettersCount($oCriteria); 
	}
	
	public function sendingProcess(SendingNewsletter $oSendingNewsletter, $categories) { 
		
		$this->addSendingNewsletter($oSendingNewsletter);
		if( !empty($categories) ){
			foreach ($categories as $cd_category) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('CA.cd_category', $cd_category, '=');
				$oCriteria->addFilter('bl_signed', 1, '=');
				$oCriteria->addFilter('bl_blocked', 0, '=');
				$oContactCategoryManager = new ContactCategoryManager();
				$contactCategories = $oContactCategoryManager->getContactCategories($oCriteria);
				foreach ($contactCategories as $oContactCategory) {
					$oCriteriaAux = new CdtSearchCriteria();
					$oCriteriaAux->addFilter('CSN.cd_sending_newsletter', $oSendingNewsletter->getCd_sending_newsletter(), '=');
					$oCriteriaAux->addFilter('CSN.cd_contact', $oContactCategory->getCd_contact(), '=');
					$oContactSendingNewsletterManager = new ContactSendingNewsletterManager();
					$contactSendingNewsletter = $oContactSendingNewsletterManager->getContactSendingNewsletter($oCriteriaAux);
					if (!$contactSendingNewsletter) {
						$oContactSendingNewsletter= new ContactSendingNewsletter();
						$oContactSendingNewsletter->setCd_category($cd_category);
						$oContactSendingNewsletter->setCd_contact($oContactCategory->getCd_contact());
						$oContactSendingNewsletter->setCd_sending_newsletter($oSendingNewsletter->getCd_sending_newsletter());
						
						$oContactSendingNewsletterManager->addContactSendingNewsletter($oContactSendingNewsletter);
					}
						
					
				}
			}
		}
		
	}
	public function sendNewsletter(SendingNewsletter $oSendingNewsletter) { 
		$cd_sending_newsletter =  CdtFormatUtils::ifEmpty( $oSendingNewsletter->getCd_sending_newsletter(), 'null' );
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('SN.bl_sent', 0, '=');
		$oCriteria->addFilter('SN.cd_status', BOL_NEWSLETTER_CD_STATUS_IN_SEND, '=');
		if ($cd_sending_newsletter != 'null') {
			$oCriteria->addFilter('SN.cd_sending_newsletter', $cd_sending_newsletter, '=');
		}
		$oCriteria->addGroupBy('SN.cd_sending_newsletter, SN.cd_newsletter, SN.dt_date, SN.ds_time, SN.bl_sent');
		$oSendingNewsletterManager = new SendingNewsletterManager();
		$sendingNewsletters = $this->getSendingNewsletters($oCriteria);
		$amountToSend=0;
		
		if (!$sendingNewsletters->isEmpty()){
			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('CSN.bl_sent', 1, '=');
			$oCriteria->addFilter('dt_sent', date("Y-m-d H:i:s",time()-3600), '>=', new CdtCriteriaFormatStringValue());
			$oCriteria->addFilter('dt_sent', date("Y-m-d H:i:s",time()), '<=', new CdtCriteriaFormatStringValue());
			
			$oContactSendingNewsletterManager = new ContactSendingNewsletterManager();
			$amountSent = $oContactSendingNewsletterManager->getContactSendingNewslettersCount($oCriteria);
			
			$amountToSend = BOL_MAIL_PER_HOUR - $amountSent;
		}
		//CdtUtils::log_debug($sendingNewsletters->size());
		if ($amountToSend) {
			$countSend = 0;	
			$sent = 1;
			$item = 0;
			$sendingNewsletters->getObjectByIndex(0)->setCd_status(BOL_NEWSLETTER_CD_STATUS_PROCESS);
			$oSendingNewsletterManager->updateSendingNewsletter($sendingNewsletters->getObjectByIndex(0));  
			while(($sent) && ($item < $sendingNewsletters->size())) {
				
				//CdtDbManager::begin_tran();
				$cd_sending_newsletter = $sendingNewsletters->getObjectByIndex($item)->getCd_sending_newsletter();
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('N.cd_newsletter', $sendingNewsletters->getObjectByIndex($item)->getCd_newsletter(), '=');
				$oNewsletterManager = new NewsletterManager();
				$oNewsletter = $oNewsletterManager->getNewsletter($oCriteria);
				CdtUtils::log_debug($oNewsletter->getCd_newsletter());
				$oNewsletter->setCd_status(BOL_NEWSLETTER_CD_STATUS_PROCESS);
				$oNewsletterManager->updateNewsletter($oNewsletter);
				///levantar template a enviar
				/*$newsletterHTML=file_get_contents(APP_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-0.html');
				$newsletterHTML='<? $social=1;?>'.$newsletterHTML;
				ob_start();
				@eval("?" . ">$newsletterHTML");
				$newsletterHTML = ob_get_contents();
				ob_end_clean();
				ob_flush();
				CdtUtils::log_debug($newsletterHTML);*/
				//$newsletterHTML = 'Le hemos enviado el boletï¿½n '.$oNewsletter->getDs_newsletter();
				$xtpl = new XTemplate( BOL_TEMPLATES.$oNewsletter->getDs_path() );
				$xtpl->assign ( 'ds_newsletter',  htmlentities( $oNewsletter->getDs_newsletter () ) );
				$xtpl->assign ( 'ds_text',  ($oNewsletter->getDs_text ()) );
				$img_header= '<img
moz-do-not-send="true"
                                                      style="display:block;border:0px;float:none;margin:0px
auto;width:600px;min-height:294px" src="'.WEB_PATH.'css/templates/images/'.$oNewsletter->getImg_header().'" title=" " alt=" "
                                                      border="0"
                                                      height="294"
                                                      width="600"/>';
				if ($oNewsletter->getDs_linkheader()) {
					$img_header = '<a href="'.$oNewsletter->getDs_linkheader().'" target="_blank">'.$img_header.'</a>';
				}
				$xtpl->assign ( 'img_header',  $img_header);
				/*$xtpl->assign ( 'table_background',  WEB_PATH.'css/templates/images/width.gif');
				$xtpl->assign ( 'body_background',  WEB_PATH.'css/templates/images/background.gif');
				$xtpl->assign ( 'backColor',  '#E7F4FF');
				
				if ($oNewsletter->getBl_facebook()) {
					$xtpl->assign ( 'linkfacebook',  '<a href="'.WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-1-0.html"><img src="'.WEB_PATH.'css/templates/images/facebook_16.png" border="0" align="top"/></a>');
				}
				if ($oNewsletter->getBl_twitter()) {
					$urlEncoded = urlencode(WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-0-0.html');
					$xtpl->assign ( 'linktwitter',  '<a href="https://twitter.com/intent/tweet?text='.urlencode(utf8_encode(substr($oNewsletter->getDs_newsletter(),0,30).'...' )).'&url='.$urlEncoded.'" target="_blank"><img src="'.WEB_PATH.'css/templates/images/twitter_16.png" border="0" align="top"/></a>');
				}
				if ($oNewsletter->getBl_linkedin()) {
		
					$xtpl->assign ( 'linklinkedin',  '&nbsp;<a href="http://www.linkedin.com/shareArticle?mini=true&url='.WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-0-0.html" target="_blank"><img src="'.WEB_PATH.'css/templates/images/linkedin_16.png" border="0" align="top"/></a>');
				}
				$img_footer= '<img src="'.WEB_PATH.'css/templates/images/'.$oNewsletter->getImg_footer().'" border="0"/>';
				if ($oNewsletter->getDs_linkfooter()) {
					$img_footer = '<a href="'.$oNewsletter->getDs_linkfooter().'" target="_blank">'.$img_footer.'</a>';
				}
				$xtpl->assign ( 'img_botton',  $img_footer);*/
				
				$xtpl->assign ( 'view_online_link',  WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-0-0.html');
				$xtpl->assign ( 'view_online_label',  BOL_MSG_NEWSLETTER_TITLE_VIEW_ONLINE);
				$xtpl->assign ( 'click_aqui',  BOL_MSG_CLICK_AQUI);
				$xtpl->assign ( 'link_ofertar_label',  BOL_MSG_NEWSLETTER_OFERTAR);
				$xtpl->assign ( 'link_ofertar',  'http://www.conexionreciclado.com.ar');
				$xtpl->assign ( 'link_facebook',  'https://www.facebook.com/conexionreciclado');
				$xtpl->assign ( 'img_fb',  WEB_PATH.'css/templates/images/fbook.png');
				$xtpl->assign ( 'link_twitter',  'https://twitter.com/cnxreciclado');
				$xtpl->assign ( 'img_twitter',  WEB_PATH.'css/templates/images/twitter.png');
				$xtpl->assign ( 'link_linkedin',  'https://www.linkedin.com/company/conexión-reciclado');
				$xtpl->assign ( 'img_linkedin',  WEB_PATH.'css/templates/images/in.png');
				$linkUnsuscription = WEB_PATH."doAction?action=edit_unsubscribe_init&cd_contact=contactUnsuscription";
				$imgUnsuscription = WEB_PATH.'css/templates/images/unsubscribe-img.png';
				$unsuscription = '<table style="width:600px;max-width:600px;margin:0
                    auto" align="center" border="0" cellpadding="20"
                    cellspacing="0">
                    <tbody>
                      <tr>
                        <td style="padding:20px 0" align="left">
                          <table align="left">
                            <tbody>
                              <tr>
                                <td
style="padding:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#333333"><span
                                    style="color:#ffffff"> </span> </td>
                              </tr>
                              <tr>
                                <td
style="padding:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#333333">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td style="float:right;padding:20px 0"
                          align="right">
                          <table align="right">
                            <tbody>
                              <tr>
                                <td
style="padding:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#333333"><span
                                    style="color:#ffffff">'.BOL_MSG_SUBSCRIPTION_UNSUBSCRIBE.'
                                  </span> <a moz-do-not-send="true"
href="'.$linkUnsuscription.'"
                                    style="color:#ffffff"
                                    target="_blank"> '.BOL_MSG_CLICK_AQUI.' </a> </td>
                              </tr>
                              <tr>
                                <td
style="padding:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#333333"
                                  align="right"> <a
                                    moz-do-not-send="true"
href="'.$linkUnsuscription.'"
                                    style="color:#ffffff"
                                    target="_blank"> <img
                                      moz-do-not-send="true"
                                      src="'.$imgUnsuscription.'"
style="width:136px;min-height:13px" align="right" border="0" height="13"
                                      width="136"> </a> </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>';
				$xtpl->assign ( 'desuscripcion',  $unsuscription);
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('I.cd_newsletter', $oNewsletter->getCd_newsletter(), '=');
				$oCriteria->addOrder('nu_order');
				
				$manager = new ItemManager();
				$oItems = $manager->getItems( $oCriteria );
				foreach ($oItems as $oItem) {
					
					$ds_image = ($oItem->getDs_image ())?'<img moz-do-not-send="true"
                                                      style="display:block;border:0px;float:none;margin:0px
auto;width:100%;min-height:280px" src="'.WEB_PATH.'css/images/image/'.$oItem->getCd_newsletter ().'/'.$oItem->getDs_image ().'" border="0"/>':'';
					$xtpl->assign ( 'ds_item',  stripslashes($oItem->getDs_item ()) );
					$xtpl->assign ( 'ds_image',  $ds_image );
					$xtpl->parse ( 'main.item' );
				}
				$xtpl->parse('main');		
				$newsletterHTML = $xtpl->text('main');
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('CSN.cd_sending_newsletter', $sendingNewsletters->getObjectByIndex($item)->getCd_sending_newsletter(), '=');
				$oCriteria->addFilter('CSN.bl_sent', 0, '=');
				$oContactSendingNewsletterManager = new ContactSendingNewsletterManager();
				$contactSendingNewsletters = $oContactSendingNewsletterManager->getContactSendingNewsletters($oCriteria);
				$itemContact = 0;
				$controlEnviados = '';
				while(($sent) && ($itemContact < $contactSendingNewsletters->size())) {
					
					//CdtUtils::log_debug($newsletterHTML.' a '.$contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_name().'('.$contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_mail().')'.' de la empresa '.$contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_company());
					$newsletterHTMLSend=str_ireplace(BOL_LBL_NEWSLETTER_CONTACT_NAME_KEYS,htmlentities($contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_name()),$newsletterHTML);
					$newsletterHTMLSend=str_ireplace(BOL_LBL_NEWSLETTER_COMPANY_NAME_KEYS,htmlentities($contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_company()),$newsletterHTMLSend);
					$newsletterHTMLSend=str_ireplace('-0.html','-'.$contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getCd_contact().'.html',$newsletterHTMLSend);
					$newsletterHTMLSend=str_ireplace('contactUnsuscription',$contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getCd_contact(),$newsletterHTMLSend);
					
					$shtml = $newsletterHTMLSend;
					$shtml .="<IMG src='".WEB_PATH."doAction?action=opening_count&id=".$contactSendingNewsletters->getObjectByIndex($itemContact)->getCd_contact_sending_newsletter()."' border='0' width='1' height='1'><div style='padding-left: 30px; padding-right: 30px; padding-top: 30px ; padding-bottom: 30px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #666666; background-color:#FFFFFF'>
	     <hr style= 'color: #999999; text-decoration: none;'>";
					$CustomHeaderArray = array();
					$CustomHeaderArray['X-Sent-Id']=$contactSendingNewsletters->getObjectByIndex($itemContact)->getCd_contact_sending_newsletter();
					$CustomHeaderArray['X-Contact-Id']=$contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getCd_contact();
					$controlEnviados .= $contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getCd_contact().',';
					
					$oContactSendingNewsletter = $contactSendingNewsletters->getObjectByIndex($itemContact);
					try{

						BOLUtils::sendMail(NOMBRE_APLICACION, $oNewsletter->getDs_mail(), $contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_name(), $contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_mail(), $oNewsletter->getDs_newsletter(), $shtml, '',$CustomHeaderArray);
						
						

					}catch(GenericException $ex){
						BOLUtils::log_mail_error($contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_name().' -> '.$contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getDs_mail());
						$oContactSendingNewsletter->setNu_hard(1);
						$oCriteria = new CdtSearchCriteria();
						$oCriteria->addFilter('cd_contact', $contactSendingNewsletters->getObjectByIndex($itemContact)->getContact()->getCd_contact(), '=');
						$oContactManager = new ContactManager();
						$oContact = $oContactManager->getContact($oCriteria);
						$oContact->setNu_hard(1);
						$oContact->setNu_soft($oContact->getNu_soft());
						$oContact->setBl_blocked(1);
						$oContactManager->updateContact($oContact, $oContact->getCategories());
					}
					
					$contactSendingNewsletters->getObjectByIndex($itemContact)->setBl_sent(1);
					$dt_date=date('Ymd-H:i:s');
					$dateArray=explode ("-", $dt_date);
					$contactSendingNewsletters->getObjectByIndex($itemContact)->setDt_date($dateArray[0]);
					$contactSendingNewsletters->getObjectByIndex($itemContact)->setDs_time($dateArray[1]);
					$contactSendingNewsletters->getObjectByIndex($itemContact)->setDt_sent(date('Y-m-d H:i:s'));
					$oContactSendingNewsletterManager->updateContactSendingNewsletter($oContactSendingNewsletter);
					
					$itemContact++;
					$countSend++;
					$sent = ($countSend<$amountToSend);
					//CdtUtils::log_debug('Se envio: '.$sent.' cant: '.$countSend.' se puede '.$amountToSend);
				}
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('CSN.cd_sending_newsletter', $sendingNewsletters->getObjectByIndex($item)->getCd_sending_newsletter(), '=');
				$oCriteria->addFilter('CSN.bl_sent', 0, '=');
				$controlEnviados = substr( $controlEnviados, 0, strlen($controlEnviados)-1); //se le quita la ï¿½ltima , (coma)
				$oCriteria->setExpresion( new CdtSimpleExpression("CSN.cd_contact IN (".$controlEnviados.")"));
				$errorSend = $oContactSendingNewsletterManager->getContactSendingNewslettersCount($oCriteria);
				if ($errorSend){
					$sent = 0;
					$msg = BOL_MSG_ERROR_SENDING_EMAIL_BODY;
			    	$params = array ($sendingNewsletters->getObjectByIndex($item)->getCd_sending_newsletter(),$oNewsletter->getCd_newsletter() );		
					$errorBody = "<div style='padding-left: 30px; padding-right: 30px; padding-top: 30px ; padding-bottom: 30px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #666666; background-color:#FFFFFF'>".CdtFormatUtils::formatMessage( $msg, $params )."</div>";
					BOLUtils::sendMail($oNewsletter->getDs_mail(), $oNewsletter->getDs_mail(), BOL_NEWSLETTER_DS_MAIL_TO, BOL_NEWSLETTER_DS_MAIL_TO, BOL_MSG_ERROR_SENDING_EMAIL_SUBJECT, $errorBody);
		
				}
				$cd_status = ($errorSend)?BOL_NEWSLETTER_CD_STATUS_ERROR:BOL_NEWSLETTER_CD_STATUS_IN_SEND;
				$sendingNewsletters->getObjectByIndex($item)->setCd_status($cd_status);
				$oSendingNewsletterManager->updateSendingNewsletter($sendingNewsletters->getObjectByIndex($item));  
				if($sent){
					$oCriteria = new CdtSearchCriteria();
					$oCriteria->addFilter('CSN.cd_sending_newsletter', $sendingNewsletters->getObjectByIndex($item)->getCd_sending_newsletter(), '=');
					$oCriteria->addFilter('CSN.bl_sent', 0, '=');
					$missing = $oContactSendingNewsletterManager->getContactSendingNewslettersCount($oCriteria);
					if (!$missing) {
						$sendingNewsletters->getObjectByIndex($item)->setBl_sent(1);
						$dt_date=date('Ymd-H:i:s');
						$dateArray=explode ("-", $dt_date);
						$sendingNewsletters->getObjectByIndex($item)->setDt_date($dateArray[0]);
						$sendingNewsletters->getObjectByIndex($item)->setDs_time($dateArray[1]);
						$sendingNewsletters->getObjectByIndex($item)->setCd_status(BOL_NEWSLETTER_CD_STATUS_SENDING);
						$oSendingNewsletterManager->updateSendingNewsletter($sendingNewsletters->getObjectByIndex($item));
						$shtmlWithoutCounting = str_replace(WEB_PATH."doAction?action=opening_count","",$shtml);
						//BOLUtils::sendMail($oNewsletter->getDs_mail(), $oNewsletter->getDs_mail(), BOL_NEWSLETTER_DS_MAIL_TO, BOL_NEWSLETTER_DS_MAIL_TO, $oNewsletter->getDs_newsletter(), $shtmlWithoutCounting);
						
						
					}
					
				}
				
				$oNewsletter->setCd_status(BOL_NEWSLETTER_CD_STATUS_SENDING);
				$oNewsletterManager->updateNewsletter($oNewsletter);
				$item++;
				//CdtDbManager::save();
			}
		}
		
		
	}
	


} 
?>
