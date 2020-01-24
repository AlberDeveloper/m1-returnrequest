<?php
//https://devdocs.magento.com/guides/m1x/magefordev/mage-for-dev-6.html
$installer = $this;
$installer->startSetup();
$installer->run("
    INSERT INTO `{$installer->getTable('sales_order_status')}` VALUES ('return_request', 'Return request');
    INSERT INTO `{$installer->getTable('sales_order_status_state')}` VALUES ('return_request', 'return_request',1);
");
$installer->endSetup();