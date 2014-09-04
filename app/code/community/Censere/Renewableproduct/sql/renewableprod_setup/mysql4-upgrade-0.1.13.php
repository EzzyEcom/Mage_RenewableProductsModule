<?php

$installer = $this;

$installer->startSetup();

$installer->run("
		
	ALTER TABLE `".$this->getTable('sales/order')."`
        ADD  `bkup_renewing_realorderid` INTEGER(10) UNSIGNED NOT NULL, 
        ADD  `bkup_previous_reprodorder_number` INTEGER(10) UNSIGNED NOT NULL
;
  ALTER TABLE `".$this->getTable('sales/order_item')."`
        ADD  `renewing_realorderqtyrenewable` TINYINT(1) UNSIGNED NOT NULL, 
        ADD  `renewing_realorderid` INTEGER(10) UNSIGNED NOT NULL,
        ADD  `renewing_renewingstate` VARCHAR(12) NOT NULL,
        ADD  `prodid_renewed` INTEGER(10) UNSIGNED NOT NULL
;
  ALTER TABLE `".$this->getTable('sales/quote')."`
        ADD  `renewing_realorderid` INTEGER(10) UNSIGNED NOT NULL, 
        ADD  `previous_reprodorder_number` INTEGER(10) UNSIGNED NOT NULL
;
  ALTER TABLE `".$this->getTable('sales/quote_item')."`
        ADD  `renewing_realorderqtyrenewable` TINYINT(1) UNSIGNED NOT NULL, 
        ADD  `renewing_realorderid` INTEGER(10) UNSIGNED NOT NULL,
        ADD  `renewing_renewingstate` VARCHAR(12) NOT NULL,
        ADD  `prodid_renewed` INTEGER(10) UNSIGNED NOT NULL
;
    ");

$installer->endSetup();