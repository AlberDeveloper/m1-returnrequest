<?php

class Alberto_ReturnRequest_RequestController extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
    }
}