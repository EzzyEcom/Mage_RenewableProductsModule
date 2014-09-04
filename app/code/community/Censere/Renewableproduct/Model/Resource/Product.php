<?php
/**
 * Created by PhpStorm.
 * User: saulo.desousa
 * Date: 3/31/14
 * Time: 11:57 AM
 */

class Censere_Renewableproduct_Model_Resource_Product
    extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('renewableprod/renewableprod_table', 'real_order_id');
    }
}