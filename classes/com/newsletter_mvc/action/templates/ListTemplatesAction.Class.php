<?php

/**
 * Acción para listar templates.
 * 
 * @author codnet archetype builder
 * @since 03-10-2012
 * 
 */
class ListTemplatesAction extends CMPGridAction {

	protected function getGridModel( CMPGrid $oGrid ){
		return new  TemplateGridModel();
	}

}
