<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\ModelContainer
 */

namespace jtl\Connector\ModelContainer;

/**
 * Customer Container Class
 * @access public
 */
class CustomerContainer extends CoreContainer
{
    /**
     * @var \jtl\Connector\Model\Customer[]
     */
    protected $_customers;
    
    /**
     * @var \jtl\Connector\Model\CustomerAttr[]
     */
    protected $_customerAttrs;
        
    /**
     * @return array \jtl\Connector\Model\Customer
     */
    public function getCustomers()
    {
        return $this->_customers;
    }
        
    /**
     * @return array \jtl\Connector\Model\CustomerAttr
     */
    public function getCustomerAttrs()
    {
        return $this->_customerAttrs;
    }
        
    public $items = array(
        "customer" => array("Customer", "Customers"),
        "customerattr" => array("CustomerAttr", "CustomerAttrs")
    );
}
?>