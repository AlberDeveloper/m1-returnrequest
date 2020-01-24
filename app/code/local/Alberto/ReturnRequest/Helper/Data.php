<?php

class Alberto_ReturnRequest_Helper_Data extends Mage_Core_Helper_Data
{
    public function getReturnRequestPostUrl(){
        return $this->_getUrl('returnrequest/return/post');
    }
}
