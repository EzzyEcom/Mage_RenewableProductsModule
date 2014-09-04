<?php
/**
 * Created by PhpStorm.
 * User: saulo.desousa
 * Date: 3/31/14
 * Time: 12:10 PM
 */
Mage::log('TABLE: renewable_products -> Installation has started');
$installer = $this;
$installer->startsetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('renewableprod/renewableprod_table'))
    ->addColumn('real_order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Order ID')
    ->addColumn('actual_order_number', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Original Order ID')
    ->addColumn('real_cust_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Real Customer ID')
    ->addColumn('cust_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'  => false,
    ), 'Customer Name')
    ->addColumn('cust_email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 25, array(
        'nullable'  => false,
    ), 'Customer Email')
    ->addColumn('old_cust_id', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Previous Customer ID')
    ->addColumn('prod_brand_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Product Brand ID')
    ->addColumn('prod_brand_name', Varien_Db_Ddl_Table::TYPE_TEXT, 50, array(
        'nullable'  => false,
    ), 'Product Brand Name')
    ->addColumn('real_prod_name', Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Real Product Name')
    ->addColumn('prod_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Real Product ID')
    ->addColumn('real_prod_qt_restrain', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Real Product Qty Restrain')
    ->addColumn('prod_key', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array(
        'nullable'  => false,
    ), 'Product Key / Serial Number')
    ->addColumn('prod_key_validator', Varien_Db_Ddl_Table::TYPE_VARCHAR, 20, array(
        'nullable'  => false,
    ), 'Product Key / Serial Number Validator')
    ->addColumn('renewal_date', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable'  => false,
    ), 'Renewal Date set within Admin Renewable Module')
    ->addColumn('modifiedby_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable'  => false,
        'default'   => 'Customer/ Store',
    ), 'Info of whom last modified the row')
    ->addColumn('last_date_modified', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
//        'default'   => 'CURRENT_TIMESTAMP',
    ), 'Date of last modification')
    ->addColumn('activestatefield', Varien_Db_Ddl_Table::TYPE_TINYINT, 1, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => '1',
    ), 'Default value 1 = active, will display within list, if value 0 = inactive')
    ->addColumn('active_renewed_purchase_orderid', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Recent Active Order Processed')
    ->addColumn('previous_purchase_orderid', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Previous Order from which this Renewal proceeded from')
    ->addColumn('renewing_finalstatus', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(
        'nullable'  => false,
    ), 'Final Status to be shown when renewable product has been successfully reordered and purchased')
    ->addColumn('renewed_times', Varien_Db_Ddl_Table::TYPE_TINYINT, 3, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Keeps track of how many times Customer has renewed product.')
    ->addColumn('reason_note', Varien_Db_Ddl_Table::TYPE_VARCHAR, 200, array(
        'nullable'  => false,
    ), 'Reason note to be given everytime any modification needs to be made.')
;


$installer->getConnection()->createTable($table);
$installer->endSetup();

Mage::log('TABLE: renewable_products -> Installation has been Completed Successfully');