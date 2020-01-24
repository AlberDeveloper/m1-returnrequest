<?php

class Alberto_ReturnRequest_ReturnController extends Mage_Sales_Controller_Abstract
{

    public function postAction(){
        $orderId = (int) $this->getRequest()->getParam('order_id');
        $comment =  $this->getRequest()->getParam('comment');

        $returnRequestState = Alberto_ReturnRequest_Model_Sales_Order::STATE_RETURN_REQUEST;

        if (!$this->_loadValidOrder($orderId)) {
            Mage::getSingleton('core/session')->addError($this->__('Unable to submit your request. Please, try again later'));
            $this->_redirect('customer/account/');
        }

        $order = Mage::registry('current_order');
        $order->setState($returnRequestState);
        $order->save();

        $order->addStatusHistoryComment($comment, $returnRequestState)
            ->setIsVisibleOnFront(true)
            ->setIsCustomerNotified(true);

        $comment = trim(strip_tags($comment));

        $order->save();
        $order->sendOrderUpdateEmail(true, $comment);

        Mage::getSingleton('core/session')->addSuccess(Mage::helper('contacts')->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.'));
        $this->_redirect('customer/account/');
    }
}