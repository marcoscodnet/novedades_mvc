<?php

/**
 * Acci�n para eliminar contactcategory.
 * 
 * @author marcos
 * @since 23-10-2012
 * 
 */

class DeleteContactCategoryAction extends CdtOutputAction {

    /**
     * (non-PHPdoc)
     * @see CdtEditAction::getEntity();
     */
    protected function getEntity() {
        //se obtiene el id de la entidad a eliminar.
        return CdtUtils::getParam('k');
    }

    protected function getLayout() {
        $oLayout = new CdtLayoutBasicAjax();
        return $oLayout;
    }

    protected function getOutputContent() {
        $xtpl = $this->getXTemplate();
        $categories = unserialize($_SESSION['categories_session']);
        $key = $this->getEntity();

        if ($key == 'x') {
            $oldCategory = $categories->getObjectByIndex(0);
            $categories->removeItemByKey(0);
        } else {
            $oldCategory = $categories->getObjectByIndex($key);
            $categories->removeItemByKey($key);            
        }

       
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

 public function getXTemplate() {
        return new XTemplate(BOL_TEMPLATE_CATEGORY_LIST_AJAX);
    }

    protected function getOutputTitle() {
        return BOL_MSG_CATEGORY_TITLE_ADD;
    }

    /**
     * parseamos la entity en el template
     * @param XTemplate $xtpl template donde parsear la entity
     * @param object $oCategory entity a parsear
     */
    public function parseEntity(XTemplate $xtpl, $oCategory) {

    }

}
