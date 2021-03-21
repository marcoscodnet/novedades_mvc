<?php 

/**
 * Acciï¿½n para visualizar un newsletter.
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ViewNewsletterAction extends CdtOutputAction{

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getLayout();
	 */
	protected function getLayout(){
		$oLayout = new CdtLayoutBasicAjax();
		return $oLayout;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputContent();
	 */
	protected function getOutputContent(){
			
		
		
		$cd_newsletter = CdtUtils::getParam('id');
			
		if (!empty( $cd_newsletter )) {

			
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('cd_newsletter', $cd_newsletter, '=');
			
			$manager = new NewsletterManager();
			$oNewsletter = $manager->getNewsletter( $oCriteria );
			
		}elseif (isset($_SESSION['newsletter_session'])) {
				$oNewsletter = unserialize($_SESSION['newsletter_session']);
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('cd_template', BOL_NEWSLETTER_CD_TEMPLATE, '=');
				
				$manager = new TemplateManager();
				$oTemplate = $manager->getTemplate( $oCriteria );
				$oNewsletter->setDs_path ( $oTemplate->getDs_path());	
				$oNewsletter->setImg_header ( $oTemplate->getImg_header());	
				$oNewsletter->setImg_footer ( $oTemplate->getImg_footer());	
		}
		else{
			$oNewsletter = parent::getEntity();
		
		}
		unset($_SESSION['newsletter_session']);
		$xtpl = $this->getXTemplate ($oNewsletter);
		//parseamos newsletter.
		$this->parseEntity( $xtpl, $oNewsletter );
			
		$xtpl->assign ( 'title', $this->getOutputTitle() );
		$xtpl->parse ( 'main' );
		return $xtpl->text ( 'main' );
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getOutputTitle();
	 */
	protected function getOutputTitle(){
		return BOL_MSG_NEWSLETTER_TITLE_VIEW;
	}

	/**
	 * (non-PHPdoc)
	 * @see CdtOutputAction::getXTemplate();
	 */
	public function getXTemplate($oNewsletter){ 
		
		return new XTemplate ( BOL_TEMPLATES.$oNewsletter->getDs_path() );
	}
	

	/**
	 * parseamos la entity en el template
	 * @param XTemplate $xtpl template donde parsear la entity
	 * @param object $oNewsletter entity a parsear
	 */
	public function parseEntity(XTemplate $xtpl, $oNewsletter){ 

		$xtpl->assign ( 'ds_newsletter',  htmlentities( $oNewsletter->getDs_newsletter () ) );
		
		
		
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
		$xtpl->assign ( 'backColor',  '#E7F4FF');*/
		$urlEncoded = urlencode(WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-0-0.html');
		
		
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
		$newsletterHTMLSend = stripslashes($oNewsletter->getDs_text ());
			$oContact = new Contact();
			$oContact->setCd_contact(0);
			if (CdtUtils::getParam('cd_contact')) {
				$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter('cd_contact', CdtUtils::getParam('cd_contact'), '=');
				
				$manager = new ContactManager();
				$oContact = $manager->getContact( $oCriteria );
				$newsletterHTMLSend=str_ireplace(BOL_LBL_NEWSLETTER_CONTACT_NAME_KEYS,htmlentities($oContact->getDs_name()),$newsletterHTMLSend);
				$newsletterHTMLSend=str_ireplace(BOL_LBL_NEWSLETTER_COMPANY_NAME_KEYS,htmlentities($oContact->getDs_company()),$newsletterHTMLSend);
				$newsletterHTMLSend=str_ireplace('-0.html','-'.$oContact->getCd_contact().'.html',$newsletterHTMLSend);
				
			}
		
		/*$xtpl->assign ( 'ds_text',  $newsletterHTMLSend );
		
		if (CdtUtils::getParam('facebook')) {
				
							$xtpl->assign ( 'scriptFBAct',
							'$(document).ready(function () {
									$.fbmodal({
										loading : "<img src=\"'.WEB_PATH.'css/images/loading.gif\" />",
										type	: "info",
										method	: "ajax",
										href	: "'.WEB_PATH.'doAction?action=like_button&url='.urlencode($urlEncoded).'",
										
										title	: "'.BOL_MSG_FACEBOOK_LIKE.'",
									        width: 530,
										closeTrigger	: false,
										escClose		: false,
										overlayClose	: false,
										buttons	: [{ 
											"text" : "'.BOL_LBL_CLOSE.'",
											"color"	: "blue",
											"callback"	: function(){ 
														putLike($.fbmodal.contenido()); 
														$.fbmodal.close();
														  
													}
										}]
								    });
								}); ');
		}
		
		if ($oNewsletter->getBl_facebook()) {
		
		if ($social) {
			
			$xtpl->assign ( 'linkfacebook',  '<a href="'.WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-1-0.html"><img src="'.WEB_PATH.'css/templates/images/facebook_16.png" border="0" align="top"/></a>');
			
		}
		else{
			$xtpl->assign ( 'linkfacebook',  '<a href="#" id="demo1"><img src="'.WEB_PATH.'css/templates/images/facebook_16.png" border="0" align="top"/></a>');
		}
		$xtpl->assign ( 'scriptFBIni', 'function putLike( contenido ){$("#news_like").html( contenido );}
						$("#demo1").live( "click", function(e){	var textVar = $("#news_like").html();
							if(textVar!=""){
							$.fbmodal({
								type	: "info",
								text	: textVar,
								title	: "'.BOL_MSG_FACEBOOK_LIKE.'",
								width: 530,
								closeTrigger	: false,
								escClose		: false,
								overlayClose	: false,
								buttons	: [{ 
									"text" : "'.BOL_LBL_CLOSE.'",
									"color"	: "blue",
									"callback"	: function(){
									$.fbmodal.close();}}]});
							}
							else{
							$.fbmodal({
									loading : "<img src=\"'.WEB_PATH.'css/images/loading.gif\" />",
									type	: "info",
									method	: "ajax",
									href	: "'.WEB_PATH.'doAction?action=like_button&url='.urlencode($urlEncoded).'",
									title	: "'.BOL_MSG_FACEBOOK_LIKE.'",
										width: 530,
									closeTrigger	: false,
									escClose		: false,
									overlayClose	: false,
									buttons	: [{ 
										"text" : "'.BOL_LBL_CLOSE.'",
										"color"	: "blue",
										"callback"	: function(){ 
													putLike($.fbmodal.contenido()); 
													$.fbmodal.close();
													  
												}
									}]
								});
							}
						});');
	}
	if ($oNewsletter->getBl_twitter()) {
		
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
	
	$xtpl->assign ( 'view_online_link',  WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-0-'.$oContact->getCd_contact().'.html');
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
	
	
	$xtpl->assign ( 'cssModal',  WEB_PATH.'css/fbmodal.css');
	$xtpl->assign ( 'jquery',  WEB_PATH.'js/jquery/jquery-1.7.min.js');
	$xtpl->assign ( 'jsModal',  WEB_PATH.'js/msgFBmodal.js');
	$xtpl->assign ( 'appnameFB',  NOMBRE_APLICACION);
	$xtpl->assign ( 'urlFB',  WEB_PATH.'newsletter/'.$oNewsletter->getCd_newsletter().'-0-'.$oContact->getCd_contact().'.html');
	$xtpl->assign ( 'imgFB',  WEB_PATH.'css/templates/images/codnet-news-s.jpg');
		
		
		
	}
}
