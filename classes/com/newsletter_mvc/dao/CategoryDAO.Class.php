<?php 

/** 
 * DAO para Category 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class CategoryDAO { 

	/**
	 * se persiste la nueva entity
	 * @param Category $oCategory entity a persistir.
	 */
	public static function addCategory(Category $oCategory) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_category = $oCategory->getDs_category();
		
		
		
		$tableName = BOL_TABLE_CATEGORY;
		
		$sql = "INSERT INTO $tableName (ds_category) VALUES('$ds_category')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oCategory->setCd_category( $cd );
	}


	/**
	 * se modifica la entity
	 * @param Category $oCategory entity a modificar.
	 */
	public static function updateCategory(Category $oCategory) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_category = $oCategory->getDs_category();
		
		
		$cd_category = CdtFormatUtils::ifEmpty( $oCategory->getCd_category(), 'null' );
		
		

		$tableName = BOL_TABLE_CATEGORY;
		
		$sql = "UPDATE $tableName SET ds_category = '$ds_category' WHERE cd_category = $cd_category "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param Category $oCategory entity a eliminar.
	 */
	public static function deleteCategory(Category $oCategory) { 
		$db = CdtDbManager::getConnection(); 

		$cd_category = $oCategory->getCd_category();

		$tableName = BOL_TABLE_CATEGORY;
		
		$sql = "DELETE FROM $tableName WHERE cd_category = $cd_category "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Category]
	 */
	public static function getCategories(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CATEGORY;

		$sql = "SELECT * FROM $tableName ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new CategoryFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getCategoriesCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CATEGORY;
		
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
	 * @return Category
	 */
	public static function getCategory(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_CATEGORY;
		
		$sql = "SELECT * FROM $tableName ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new CategoryFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
