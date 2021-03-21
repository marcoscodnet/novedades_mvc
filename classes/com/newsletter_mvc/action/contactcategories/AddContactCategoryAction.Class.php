<?php 

/**
 * Acción para dar de alta un contactCategory.
 * 
 * @author marcos
 * @since 23-10-2012
 * 
 */
class AddContactCategoryAction extends CdtOutputAction {


	protected function getLayout() {
        $oLayout = new CdtLayoutBasicAjax();
        return $oLayout;
    }
    
	protected function getOutputContent() {
        $xtpl = $this->getXTemplate();
        $categories = unserialize($_SESSION['categories_session']);
        
        $loaded_categories= $categories->current();
        $oCategory = $this->getEntity();
                           
        $categories->push($oCategory);
        $_SESSION['categories_session'] = serialize($categories);

        $xtpl->assign('ds_category_label', BOL_MSG_CATEGORY_TITLE);
        $xtpl->assign('delete_label', BOL_LBL_DELETE);
        $xtpl->assign('msg_confirm_delete', BOL_MSG_CONFIRM_DELETE_QUESTION);
        $xtpl->assign('msg_confirm_title', CDT_CMP_GRID_MSG_CONFIRM_DELETE_TITLE);
              
         //parseamos categories.
        $this->parseCategories($categories, $xtpl);
        $xtpl->assign('title', $this->getOutputTitle());
        $xtpl->parse('main');
        return $xtpl->text('main');
    }

   

    protected function parseCategories($collection, XTemplate $xtpl) {
        
    	foreach ($collection as $key => $oCategory) {
            if ($key == 0) {
                $key = 'x';
            }
            $xtpl->assign('key', $key);
           
            $xtpl->assign('ds_category', ($oCategory->getDs_category()));
            $xtpl->parse('main.itemcategories');
        }
    }

    protected function getEntity() {
        //se construye el product a modificar.
       
        
        $oCategory = null;

		//recuperamos dado su identifidor.
		$cd_category = CdtUtils::getParamPOST('cd_category');
			
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('cd_category', $cd_category, '=');
		
		$manager = new CategoryManager();
		$oCategory = $manager->getCategory( $oCriteria );
        return $oCategory;
    }

    public function getXTemplate() {
        return new XTemplate(BOL_TEMPLATE_CATEGORY_LIST_AJAX);
    }

    protected function getOutputTitle() {
        return BOL_MSG_CATEGORY_TITLE_ADD;
    }

    /**
     * parseamos la entity en el template
     * @param XTemplate $xtpl template donde parsear la entity
     * @param object $oProduct entity a parsear
     */
    public function parseEntity(XTemplate $xtpl, $oProduct) {

    }
		
	
}
