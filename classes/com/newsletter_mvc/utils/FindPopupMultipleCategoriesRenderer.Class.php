<?php

/**
 * Encargado de renderizar la grilla 
 *
 * @author marcos
 * @since 13-11-2012
 *
 */
class FindPopupMultipleCategoriesRenderer extends FindPopupMultipleRichGridRenderer{

	
	
	public function getActionList(){
		return "list_categories_to_send";
	}	
	
}