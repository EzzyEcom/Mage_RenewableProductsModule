<?php
/**
 * Created by PhpStorm.
 * User: saulo.desousa
 * Date: 4/29/14
 * Time: 8:05 AM
 */

class Censere_Renewableproduct_IndexController extends Mage_Adminhtml_Controller_Action
{

    public function renewableprodfilterAction()
    {
        Mage::log('You Reached the renewableprodfilterAction()');
        $this->loadLayout();
        $this->renderLayout();
    }

    public function renewableprodeditAction()
    {
        Mage::log('You Reached the renewableprodeditAction()');
        $this->loadLayout();
        $this->renderLayout();
    }

    public function renewableprodeditedfieldsAction() {

        Mage::log('You have Reached renewableprodeditedfieldsAction');
        $session = Mage::getSingleton('admin/session');
        $backenduser = $session->getUser();
        $request = Mage::app()->getRequest();

        $transid = $request->getParam('transid');
        $orderid = $request->getParam('orderid');
        $custid = $request->getParam('custid');
        $oldcustid = $request->getParam('oldcustid');
        $custname = $request->getParam('custname');
        $custemail = $request->getParam('custemail');
        $prodid = $request->getParam('prodid');
        $prodname = $request->getParam('prodname');
        $prodkey = $request->getParam('prodkey');
        $renewaldate = $request->getParam('renewaldate');
        $comment = $request->getParam('comment');
        Mage::log(print_r('renewableprodeditedfieldsAction Params: '. 'transid: '.$request->getParam('transid').' orderid: '. $request->getParam('orderid') .' custid: '. $request->getParam('custid') .' oldcustid: '. $request->getParam('oldcustid') .' custname: '. $request->getParam('custname') .' prodid: '. $request->getParam('prodid') .' prodname: '. $request->getParam('prodname') .' prodkey: '. $request->getParam('prodkey') .' renewaldate: '. $request->getParam('renewaldate'),true));

        $renewableproductlist = Mage::getModel('renewableprod/product')->load($transid);
           $renewableproductlist->setActualOrderNumber($orderid)
                                ->setRealCustId($custid)
                                ->setOldCustId($oldcustid)
                                ->setCustName($custname)
                                ->setCustEmail($custemail)
                                ->setProdId($prodid)
                                ->setRealProdName($prodname)
                                ->setProdKey($prodkey)
                                ->setProdKeyValidator($prodkey)
                                ->setRenewalDate($renewaldate)
                                ->setModifiedbyName($backenduser->getFirstname().', '.$backenduser->getEmail().', '.$backenduser->getUsername())
                                ->setLastDateModified(date('Y/m/d'))
                                ->setRenewingFinalstatus('This Product has been CHANGED within the Backend')
                                ->setReasonNote($comment)
                                ->save();
        $backtoUrl = Mage::getUrl('renewableprod/adminhtml_renewableprodlist');
        Mage::getSingleton('core/session')->addSuccess($this->__('<div style="margin-left:8.5%;">★ Informaci&oacute;n Guardada exitosamente! ★</div>'));
        $this->_redirectUrl ($backtoUrl);
    }
}
