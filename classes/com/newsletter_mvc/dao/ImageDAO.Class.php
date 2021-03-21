<?php 

/** 
 * DAO para Image 
 *  
 * @author codnet archetype builder
 * @since 03-10-2012
 */ 
class ImageDAO { 

	/**
	 * se persiste la nueva entity
	 * @param Image $oImage entity a persistir.
	 */
	public static function addImage(Image $oImage) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_image = $oImage->getDs_image();
		
		$nu_size = $oImage->getNu_size();
		
		$ds_type = $oImage->getDs_type();
		
		$dt_date = $oImage->getDt_date();
		
		
		$cd_image_category =  CdtFormatUtils::ifEmpty( $oImage->getCd_image_category(), 'null' );
		
		$cd_template =  CdtFormatUtils::ifEmpty( $oImage->getCd_template(), 'null' );
		
		
		$tableName = BOL_TABLE_IMAGE;
		
		$sql = "INSERT INTO $tableName (cd_image_category, cd_template, ds_image, nu_size, ds_type, dt_date) VALUES($cd_image_category, $cd_template, '$ds_image', '$nu_size', '$ds_type', '$dt_date')"; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		//seteamos el nuevo id.
		$cd = $db->sql_nextid();
        $oImage->setCd_image( $cd );
	}


	/**
	 * se modifica la entity
	 * @param Image $oImage entity a modificar.
	 */
	public static function updateImage(Image $oImage) { 
		$db = CdtDbManager::getConnection(); 

		
		$ds_image = $oImage->getDs_image();
		
		$nu_size = $oImage->getNu_size();
		
		$ds_type = $oImage->getDs_type();
		
		$dt_date = $oImage->getDt_date();
		
		
		$cd_image = CdtFormatUtils::ifEmpty( $oImage->getCd_image(), 'null' );
		
		$cd_image_category = CdtFormatUtils::ifEmpty( $oImage->getCd_image_category(), 'null' );
		
		$cd_template = CdtFormatUtils::ifEmpty( $oImage->getCd_template(), 'null' );
		
		

		$tableName = BOL_TABLE_IMAGE;
		
		$sql = "UPDATE $tableName SET cd_image_category = $cd_image_category, cd_template = $cd_template, ds_image = '$ds_image', nu_size = '$nu_size', ds_type = '$ds_type', dt_date = '$dt_date' WHERE cd_image = $cd_image "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se elimina la entity
	 * @param Image $oImage entity a eliminar.
	 */
	public static function deleteImage(Image $oImage) { 
		$db = CdtDbManager::getConnection(); 

		$cd_image = $oImage->getCd_image();

		$tableName = BOL_TABLE_IMAGE;
		
		$sql = "DELETE FROM $tableName WHERE cd_image = $cd_image "; 

		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

	}

	/**
	 * se obtiene una colecci�n de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return ItemCollection[Image]
	 */
	public static function getImages(CdtSearchCriteria $oCriteria) { 
		
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_IMAGE;

		$sql = "SELECT * FROM $tableName ";
		//TODO left joins
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		$items = CdtResultFactory::toCollection($db, $result, new ImageFactory());
		$db->sql_freeresult($result);
		return $items;
	}

	
	/**
	 * se obtiene la cantidad de entities dado el filtro de b�squeda
	 * @param CdtSearchCriteria $oCriteria filtro de b�squeda.
	 * @return int
	 */
	public static function getImagesCount(CdtSearchCriteria $oCriteria) { 
		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_IMAGE;
		
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
	 * @return Image
	 */
	public static function getImage(CdtSearchCriteria $oCriteria) { 

		$db = CdtDbManager::getConnection(); 

		$tableName = BOL_TABLE_IMAGE;
		
		$sql = "SELECT * FROM $tableName ";
		 
		$sql .= $oCriteria->buildCriteria();
		
		$result = $db->sql_query($sql);
		if (!$result)//hubo un error en la bbdd.
			throw new DBException($db->sql_error());

		if ($db->sql_numrows() > 0) {
			$temp = $db->sql_fetchassoc($result);
			$factory = new ImageFactory();
			$obj = $factory->build($temp);
		}
		$db->sql_freeresult($result);
		return $obj;
	}

} 
?>
