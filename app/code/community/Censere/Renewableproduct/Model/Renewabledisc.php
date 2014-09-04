<?php
class Censere_Renewableproduct_Model_Renewabledisc extends Varien_Object{

    private function getDiscbybrandconfig($quote)
    {

            /*
                     * This brings the session and customer info
                     * */


    try{

        $session = Mage::getSingleton('customer/session');
        $customer = $session->getCustomer();

            /*
             * This brings the data from sales_flat_order_item table in order to query the catalog_product_flat table
             * */
        //$cart = ->getData('cart');

        //$quote = $cart->getData('quote');

        $discpercentitems = $quote->getAllVisibleItems();

        /*
         * Here we get the Cookies' value set on the 'addtocart page'
         * */
        $realorderqtyrenewablename   = 'realorderqtyrenewable';
        $realorderidname             = 'realorderid';
        $renewingstatename           = 'renewingstate';
        $prodidname                  = 'prodid';
            $_realorderqtyrenewablevalue = Mage::getModel('core/cookie')->get($realorderqtyrenewablename);
                $_realorderidvalue = Mage::getModel('core/cookie')->get($realorderidname);
                    $_renewingstatevalue = Mage::getModel('core/cookie')->get($renewingstatename);
                        $_prodidvalue = Mage::getModel('core/cookie')->get($prodidname);

        Mage::log('We have reached the getDiscbybrandconfig() Function where we validate Cookies and compare data from the Renewal_Products DB Table => $_realorderqtyrenewablevalue: ' . $_realorderqtyrenewablevalue . ' $_realorderidvalue: ' . $_realorderidvalue . ' $_renewingstatevalue: ' . $_renewingstatevalue . ' $_prodidvalue: ' . $_prodidvalue);
            /*
             * Here we go thru all items within the order getting each ProductId
             * */
        $renewaldiscsum = 0;
        foreach($discpercentitems as $discpercentage)
        {
            $product = Mage::getModel('catalog/product')->load($discpercentage->getProductId());
            $renewableproductlist = Mage::getModel('renewableprod/product')->load($_realorderidvalue)
//                                                                           ->getCollection()
//                                                                           ->addFieldToSelect('*')
//                                                                           ->addFieldToFilter('real_cust_id', $customer->getId())
//                                                                           ->addFieldToFilter('prod_id', $discpercentage->getProductId())
//                                                                           ->addFieldToFilter('real_order_id', $discpercentage->getRealRenewalProdOrderId())
            ;
                /*
                 * Here we create a minimum Date validation prior to renewal and compare against the current date
                 * */
                    $minimumdatevalueprior = 60;
                    $fixeddate = strtotime(date('Y-m-d'));
                    $datetoexpire = strtotime($renewableproductlist->getRenewalDate());
                    $dateresult = $datetoexpire - $fixeddate;
                    $days_remaining = floor($dateresult / 86400);

                    Mage::log('This is the fixeddate: '.$fixeddate.'  This is the datetoexpire: '.$datetoexpire.'  This is the result from the Fixeddate - daystoexpire: '.$days_remaining.' Date to Subtract:'.$dateresult);

                    /*
                     * Here we apply a condition to the type of product being purchased, if renewable product, than it passes, otherwise it doesn't
                     * */
            Mage::log('If 0 :' . ($product->getRenewable()== 1));
            Mage::log('If 1 :' . ($_realorderidvalue == $renewableproductlist->getRealOrderId()));
            //Mage::log('If 2 :' . ($_realorderqtyrenewablevalue == $renewableproductlist->getRealProdQtRestrain()));
            Mage::log('If 3 :' . ($_renewingstatevalue == $discpercentage->getRenewingRenewingstate()));
            Mage::log('If 4 :' . ($_prodidvalue == $renewableproductlist->getProdId()));
            Mage::log('If 5 :' . ($renewableproductlist->getRealCustId() == $customer->getId()));
            Mage::log('If 6 :' . ($renewableproductlist->getProdKey() == $renewableproductlist->getProdKeyValidator()));
            Mage::log('If 7 :' . ($days_remaining < $minimumdatevalueprior));
//            Mage::log('If 8 :' . ($renewableproductlist->getRealProdQtRestrain() == $discpercentage->getRenewingRealorderqtyrenewable()));


            if($product->getRenewable()== 1 && $_realorderidvalue == $renewableproductlist->getRealOrderId() && $_renewingstatevalue == $discpercentage->getRenewingRenewingstate() && $_prodidvalue == $renewableproductlist->getProdId() && $renewableproductlist->getRealCustId() == $customer->getId() && $renewableproductlist->getProdKey() == $renewableproductlist->getProdKeyValidator() && $days_remaining < $minimumdatevalueprior)
            {
                /*
                 * Here we apply the passed product thru the condition to a math calculation in order to get the discount amount based on the percentage set on each renewable product by the site admin
                 * */
                $renewaldiscountpercentage = $discpercentage->getPrice() * $product->getRenewalbranddiscpercentage();
                $renewaldiscountpercent = $renewaldiscountpercentage / 100;
                $renewaldiscsum += $renewaldiscountpercent;
            }else{
                echo 'Unable to Start the Renewal Process. Please Try Again Later. Or Check to see if All Renewal Parameters are met before retrying. Thank you!';
            }
            Mage::log('Censere_Renewableproduct_Model_Renewabledisc -> getDiscbybrandconfig($quote)= '. $renewaldiscsum);
        }
//        $renewaldiscsum = 0;
//        $renewaldiscountpercentage = 1686.10 * 30/*$product->getRenewalbranddiscpercentage()*/;
//        $renewaldiscountpercent = $renewaldiscountpercentage / 100;
//        $renewaldiscsum += $renewaldiscountpercent;

        return $renewaldiscsum;

        }catch (Exception $error){Mage::log($error->getMessage());}
    }



//    private FEE_AMOUNT = ;
	public function getFee($quote)
    {

        Mage::log('Censere_Renewableproduct_Model_Renewabledisc -> getFee() ');

        try{
//            $discforitem = Mage::getModel('renewableprod/renewabledisc')->getDiscbybrandconfig();
            return $this->getDiscbybrandconfig($quote);
//            return self::getDiscbybrandconfig();
        }catch (Exception $error){Mage::log($error->getMessage());}
	}

    public static function canApply($address)
    {

        Mage::log('Censere_Renewableproduct_Model_Renewabledisc -> canApply($address) ');
				//put here your business logic to check if renewaldiscount should be applied or not
		//if($address->getAddressType() == 'billing'){
        try{
//                $address = Mage::getModel('catalog/product')->load();
//                if($address->getRenewable() == 1){
                return true;


        }catch (Exception $error){ Mage::log($error->getMessage()); }

	}
}
