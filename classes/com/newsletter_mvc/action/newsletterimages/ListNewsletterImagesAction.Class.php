<?php

/**
 * Acción para listar newsletterImages.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListNewsletterImagesAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  NewsletterImageGridModel();
	}

}
