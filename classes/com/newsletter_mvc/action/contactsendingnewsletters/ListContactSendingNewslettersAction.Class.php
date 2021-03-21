<?php

/**
 * Acción para listar contactSendingNewsletters.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListContactSendingNewslettersAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  ContactSendingNewsletterGridModel();
	}

}
