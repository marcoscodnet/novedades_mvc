<?php

/**
 * Acción para listar imageCategories.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListImageCategoriesAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  ImageCategoryGridModel();
	}

}
