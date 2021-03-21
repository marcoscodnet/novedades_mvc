<?php
class CdCategoryComparator implements IItemComparator{
	
	function equals( $oObjeto1, $oObjeto2){
		return ($oObjeto1->getCd_category() == $oObjeto2->getCd_category());
	
	}
	
}