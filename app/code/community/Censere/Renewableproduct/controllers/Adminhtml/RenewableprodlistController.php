<?php
class Censere_Renewableproduct_Adminhtml_RenewableprodlistController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
        $this->_initAction()
            ->_title($this->__('Renewables'))
            ->_addBreadcrumb($this->__('Renewables'), $this->__('Renewables'));

        $this->renderLayout();
    }

	protected function _initAction()
    {
        $this->_title($this->__('Renewables'))
            ->loadLayout()
            ->_setActiveMenu('renewableprod/renewableprod');

        return $this;
    }
}