<?php 

/** 
 * Layout para newsletter_mvc 
 *  
 * @author codnet archetype builder
 * @since 
 */ 
class LayoutBOL extends LayoutSmile{

	
	/**
	 * (non-PHPdoc)
	 * @see LayoutDesktop::parseStyles();
	 */
	protected function parseStyles($xtpl){
	
		parent::parseStyles( $xtpl );
			
		$xtpl->assign('css', WEB_PATH ."css/newsletter_mvc.css");
		$xtpl->parse('main.estilo');				
		
	}
	
	
}
