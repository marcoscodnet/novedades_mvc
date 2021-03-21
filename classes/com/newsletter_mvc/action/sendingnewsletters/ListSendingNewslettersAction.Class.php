<?php

/**
 * Acción para listar sendingNewsletters.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListSendingNewslettersAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  SendingNewsletterGridModel();
	}

}
