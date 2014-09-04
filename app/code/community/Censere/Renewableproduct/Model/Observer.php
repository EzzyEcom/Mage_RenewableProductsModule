<?php
/**
 * Created by Saulo Ferreira.
 * User: saulo.desousa
 * Date: 3/31/14
 * Time: 11:56 AM
 */

class Censere_Renewableproduct_Model_Observer
{

    public function saveCheckoutRenewableProds($observer) //this retrieves info from orders previously placed in order to display them
    {
        Mage::log('Censere_Renewableproduct_Model_Observer -> saveCheckoutRenewableProds($observer)');

        /*
         * This brings the session and customer info
         * */
       try{

        $session = Mage::getSingleton('customer/session');
        $customer = $session->getCustomer();

        /*
         * This brings the order to be observed in order to pull and save data
         * */
        $order = $observer->getOrder();

        /*
         * This brings the data from sales_flat_order_item table in order to query the catalog_product_flat table
         * */

        $order_itemflat = $order->getAllItems();

        /*
         * Here we go thru all items within the order getting each ProductId
         * */
           $prodkeyname     = 'prodkey';
           $prodkeyvalue = Mage::getModel('core/cookie')->get($prodkeyname);

        foreach($order_itemflat as $renewable_item){

            $product = Mage::getModel('catalog/product')->load($renewable_item->getProductId());

            /*
             * Here we start filtering product by attribute='renewable(1=Yes / 0=No)'
             * */
                if ($product->getRenewable()== 1 && $product->getRenewing() != 880) {
                Mage::log('The FOR Loop has started for $renewable_item->getQtyOrdered() of: ' . $renewable_item->getQtyOrdered());
                    for ($x = 1; $x <= (int)$renewable_item->getQtyOrdered(); $x++){

                            $renewalsModel = Mage::getModel('renewableprod/product');
                            /*
                             * This opens Product AttributeSet Data and uses the Catalog Product Table with the Product Id from the Order Flat Item Table
                             * */
                            $_prodattributeset = Mage::getModel('eav/entity_attribute_set')->load($product->getAttributeSetId());
Mage::log('Preparing to Save New Prod with Renewable Attribute to RENEWABLE_PRODUCTS TABLE...');

                        Mage::log('Preparing to Save: '.'->setActualOrderNumber($order->getIncrementId())= '.$order->getIncrementId());
                        Mage::log('Preparing to Save: '.'->setRealCustId($customer->getId())= '.$customer->getId());
                        Mage::log('Preparing to Save: '.'->setCustName($customer->getFirstname())= '.$customer->getFirstname());
                        Mage::log('Preparing to Save: '.'->setCustEmail($customer->getEmail())= '.$customer->getEmail());
                        Mage::log('Preparing to Save: '.'->setProdBrandId($_prodattributeset->getAttributeSetId())= '.$_prodattributeset->getAttributeSetId());
                        Mage::log('Preparing to Save: '.'->setProdBrandName($_prodattributeset->getAttributeSetName())= '.$_prodattributeset->getAttributeSetName());
                        Mage::log('Preparing to Save: '.'->setProdId($renewable_item->getProductId())= '.$renewable_item->getProductId());
                        Mage::log('Preparing to Save: '.'->setRealProdName($renewable_item->getName())= '.$renewable_item->getName());
                        Mage::log('Preparing to Save: '.'->setRealProdQtRestrain(1)= 1');
                        Mage::log('Preparing to Save: '.'->setModifiedbyName(`Store: New Order`)= Store: New Order');

                        $renewalsModel->setActualOrderNumber($order->getIncrementId())
                            ->setRealCustId($customer->getId())
                            ->setCustName($customer->getFirstname())
                            ->setCustEmail($customer->getEmail())
                            ->setProdBrandId($_prodattributeset->getAttributeSetId())
                            ->setProdBrandName($_prodattributeset->getAttributeSetName())
                            ->setProdId($renewable_item->getProductId())
                            ->setRealProdName($renewable_item->getName())
                            ->setRealProdQtRestrain(1)
                            ->setModifiedbyName('Store: New Order')
                            ->save();
                    }
                    Mage::log('SAVED: '.'->setActualOrderNumber($order->getIncrementId())= '.$order->getIncrementId());
                    Mage::log('SAVED: '.'->setRealCustId($customer->getId())= '.$customer->getId());
                    Mage::log('SAVED: '.'->setCustName($customer->getFirstname())= '.$customer->getFirstname());
                    Mage::log('SAVED: '.'->setCustEmail($customer->getEmail())= '.$customer->getEmail());
                    Mage::log('SAVED: '.'->setProdBrandId($_prodattributeset->getAttributeSetId())= '.$_prodattributeset->getAttributeSetId());
                    Mage::log('SAVED: '.'->setProdBrandName($_prodattributeset->getAttributeSetName())= '.$_prodattributeset->getAttributeSetName());
                    Mage::log('SAVED: '.'->setProdId($renewable_item->getProductId())= '.$renewable_item->getProductId());
                    Mage::log('SAVED: '.'->setRealProdName($renewable_item->getName())= '.$renewable_item->getName());
                    Mage::log('SAVED: '.'->setRealProdQtRestrain(1)= 1');
                    Mage::log('SAVED: '.'->setModifiedbyName(`Store: New Order`)= Store: New Order');
Mage::log('New Prod with Renewable Attribute has been SAVED into RENEWABLE_PRODUCTS TABLE!');

                }else if ($product->getRenewable()== 1 && $product->getRenewing() == 880 && $order->getRenewingRealorderid() != null || ''){

                            $renewalsModeldeactivator = Mage::getModel('renewableprod/product')->load($order->getRenewingRealorderid());
                            $frequency = $renewalsModeldeactivator->getRenewedTimes();

//                    Mage::log('$renewalsModeldeactivator->setRenewedTimes(): ' . $frequency);
//                    Mage::log('$renewalsModeldeactivator->setRenewedTimes()++: ' . $frequency++);
                            $renewalsModel = Mage::getModel('renewableprod/product');
                            /*
                             * This opens Product AttributeSet Data and uses the Catalog Product Table with the Product Id from the Order Flat Item Table
                             * */
                            $_prodattributeset = Mage::getModel('eav/entity_attribute_set')->load($product->getAttributeSetId());
Mage::log('Preparing to Save Renewable Prod...');
                              $renewalsModel->setActualOrderNumber($order->getIncrementId())
                                            ->setRealCustId($customer->getId())
                                            ->setCustName($customer->getFirstname())
                                            ->setCustEmail($customer->getEmail())
                                            ->setProdBrandId($_prodattributeset->getAttributeSetId())
                                            ->setProdBrandName($_prodattributeset->getAttributeSetName())
                                            ->setProdId($renewable_item->getProductId())
                                            ->setRealProdName($renewable_item->getName())
                                            ->setRealProdQtRestrain($renewable_item->getQtyOrdered())
                                            ->setProdKey($prodkeyvalue)
                                            ->setProdKeyValidator($prodkeyvalue)
                                            ->setModifiedbyName('Customer: '.$customer->getFirstname().' Em@il: '.$customer->getEmail())
                                            ->setPreviousPurchase_orderid($order->getPreviousReprodorderNumber())
                                            ->setRenewingFinalstatus('Completed')
                                            ->setRenewedTimes($frequency +1)
                                            ->setReasonNote('This purchase or renewal has been originated within Magento')
                                            ->save();
Mage::log('Renewable Prod Renewal Purchased has been SAVED into renewable table!');
                    Mage::log('Deactivating Orinal Renewable Prod Order...');
                              $renewalsModeldeactivator->setActivestatefield(0)
                                                       ->setActiveRenewedPurchaseOrderid($order->getIncrementId())
                                                       ->setRenewingFinalstatus('Reorder & Completed on: '.$order->getIncrementId())
                                                       ->save();
                    Mage::log('Original Renewable Prod Order has been Deactived Successfully!');
                }

                else{echo 'Unable to Proceed...Please go back to Renewables List and Refresh by pressing F5';}
        }
      }catch (Exception $error){Mage::log($error->getMessage());}
  }


     public function saveRenewableProducttoQuote($observer)
      {

              try{

                    $session = Mage::getSingleton('customer/session');
                    $customer = $session->getCustomer();


                      $cart = $observer->getData('cart');

                      $quote = $cart->getData('quote');

                      $items = $quote->getAllVisibleItems();

                          $realorderqtyrenewablename   = 'realorderqtyrenewable';
                          $realorderidname             = 'realorderid';
                          $renewingstatename           = 'renewingstate';
                          $prodidname                  = 'prodid';
                          $previousreprodordername     = 'previousreprodordernumber';
                             $_realorderqtyrenewablevalue = Mage::getModel('core/cookie')->get($realorderqtyrenewablename);
                               $_realorderidvalue = Mage::getModel('core/cookie')->get($realorderidname);
                                $_renewingstatevalue = Mage::getModel('core/cookie')->get($renewingstatename);
                                 $_prodidvalue = Mage::getModel('core/cookie')->get($prodidname);
                                  $previousreprodordervalue = Mage::getModel('core/cookie')->get($previousreprodordername);
                  Mage::log('$_realorderqtyrenewablevalue: ' . $_realorderqtyrenewablevalue . ' $_realorderidvalue: ' . $_realorderidvalue . ' $_renewingstatevalue: ' . $_renewingstatevalue . ' $_prodidvalue: ' . $_prodidvalue);

                  $quotesave = Mage::getModel('sales/quote')->load($quote->getEntityId());

                  $quotesave->setRenewingRealorderid($_realorderidvalue)
                            ->setPreviousReprodorderNumber($previousreprodordervalue)
                            ->save()
                  ;

                  foreach($items as $renewable_quote_item)
                  {
                      if($renewable_quote_item->getProductId() == $_prodidvalue)
                      {

                      $renewable_quote_item->setRenewingRealorderqtyrenewable($_realorderqtyrenewablevalue)
                                            ->setRenewingRealorderid($_realorderidvalue)
                                            ->setRenewingRenewingstate($_renewingstatevalue)
                                            ->setProdidRenewed($_prodidvalue)
                                            ->save()
                          ;
                            Mage::log('Foreach has been reached and Data has been temporarily saved to quote_item table');
                      }

                  }

             }catch (Exception $error){ Mage::log($error->getMessage());}

          }



}