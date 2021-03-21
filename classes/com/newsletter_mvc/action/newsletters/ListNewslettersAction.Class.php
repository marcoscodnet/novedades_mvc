<?php

/**
 * Acción para listar newsletters.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListNewslettersAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  NewsletterGridModel();
	}

}
