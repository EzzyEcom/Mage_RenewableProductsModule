<?php
/**
 * Created by PhpStorm.
 * User: saulo.desousa
 * Date: 3/31/14
 * Time: 11:57 AM
 */
class Censere_Renewableproduct_Model_Resource_Product_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('renewableprod/product');
    }

//    public function addCustomerFilterRenewableprod($customer)
//    {
//        //$this->addFieldToFilter('real_cust_id',$customer->getId())->load();
////        $select = $this->getSelect();
////        if ($customer->getId()){
////            $select->where('order.customer_id=?', $customer->getId());
////        }else{
////            //Force empty result set for not logged in customers
////            $select->where('1=0');
////        }
////        $select->join(array('order' => $this->getTable('sales/order')),
////            'order.entity_id = main_table.real_order_id',
////            array('status', 'created_at'));
////        $select->join(array('order_item' => $this->getTable('sales/order_item')),
////            'order_item.order_id = main_table.real_order_id
////            AND order_item.parent_item_id IS NULL ',
////            array());
////        /*Mage_Core_Model_Resource_Helper)Mysql4 */
////        Mage::getResourceHelper('core')->addGroupConcatColumn($select, 'product_names', 'order_item.name', ', ');
////        $select->group('main_table.real_order_id');
////        return $this;
//
//    }
}