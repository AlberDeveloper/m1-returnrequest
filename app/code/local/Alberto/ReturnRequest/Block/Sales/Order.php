<?php
class Alberto_ReturnRequest_Block_Sales_Order extends Mage_Core_Block_Template
{
    public function getOrders(){
        $orders = array();
        $customerId = Mage::getSingleton('customer/session')->getCustomerId();
        $orderCollection = Mage::getResourceModel('sales/order_collection')
            ->addFieldToSelect('*')
            ->addFieldToFilter('customer_id', $customerId)
            ->setOrder('created_at', 'desc');

        foreach($orderCollection as $order){
            if($this->canReturn($order))
                $orders[$order->getId()] = $order->getIncrementId();
        }

        return $orders;
    }

    /**
     * Retrieve form posting url
     *
     * @return string
     */
    public function getPostActionUrl()
    {
        return $this->helper('returnrequest')->getReturnRequestPostUrl();
    }

    protected function canReturn(Mage_Sales_Model_Order $order)
    {
        //Check refund availability
        return $order->getStatus() != Alberto_ReturnRequest_Model_Sales_Order::STATE_RETURN_REQUEST
        && $order->canCreditmemo();
    }
}
