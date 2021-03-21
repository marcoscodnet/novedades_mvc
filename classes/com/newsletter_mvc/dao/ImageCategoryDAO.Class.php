<?php 

/** 
 * DAO para ImageCategory 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageCategoryDAO { 

	/**
	 * se persiste la nueva entity
	 * @param ImageCategory $oImageCategory entity a persistir.
	 */
	public static function addImageCategory(ImageCategory $oImageCategory) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_image_category = $oImageCategory->getDs_image_category();
		
		
		
		$tableName = BOL_TABLE_IMAGECATEGORY;
		
		$sql = "INSERT INTO $tableName (ds_image_category) VALUES('$ds_image_category')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oImageCategory->setCd_image_category( $cd );
	}


	/**
	 * se modifica la entity
	 * @param ImageCategory $oImageCategory entity a modificar.
	 */
	public static function updateImageCategory(ImageCategory $oImageCategory) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_image_category = $oImageCategory->getDs_image_category();
		
		
		$cd_image_category = CdtFormatUtils::ifEmpty( $oImageCategory->getCd_image_category(), 'null' );
		
		

		$tableName = BOL_TABLE_IMAGECATEGORY;
		
		$sql = "UPDATE $tableName SET ds_image_category = '$ds_image_category' WHERE cd_image_category = $cd_image_category "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param ImageCategory $oImageCategory entity a eliminar.
	 */
	public static function deleteImageCategory(ImageCategory $oImageCategory) { 
		$db = CdtDbManager::getConnection(); 

		$cd_image_category = $oImageCategory->getCd_image_category();

		$tableName = BOL_TABLE_IMAGECATEGORY;
		
		$sql = "DELETE FROM $tableName WHERE cd_image_category = $cd_image_category "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[ImageCategory]
	 */
	public static function getImageCategories(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_IMAGECATEGORY;

		$sql = "SELECT * FROM $tableName ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new ImageCategoryFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getImageCategoriesCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_IMAGECATEGORY;
		
		$sql = "SELECT count(*) as count FROM $tableName "; 
		//TODO left joins
		
		$sql .= $oCriteria->buildCriteriaWithoutPaging();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$next = $db->sql_fetchassoc($result);
		$cant = $next['count'];
		$db->sql_freeresult($result);
		return ((int) $cant);
	}


	/**
	 * se obtiene un entity dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ImageCategory
	 */
	public static function getImageCategory(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_IMAGECATEGORY;
		
		$sql = "SELECT * FROM $tableName ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new ImageCategoryFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
