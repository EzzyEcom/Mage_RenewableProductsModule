<?php
/**
 * Created by PhpStorm.
 * User: saulo.desousa
 * Date: 3/31/14
 * Time: 11:55 AM
 */

class Censere_Renewableproduct_ListController
    extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){
        Mage::log('We have reached the Controller');
        $this->loadLayout();

        $this->renderLayout();
    }

}