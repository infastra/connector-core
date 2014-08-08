<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage Product
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Product price properties..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage Product
 * 
 * @Serializer\AccessType("public_method")
 */
class ProductPrice extends DataModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected $customerGroupId = null;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * @var double Price value (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("netPrice")
     * @Serializer\Accessor(getter="getNetPrice",setter="setNetPrice")
     */
    protected $netPrice = 0.0;

    /**
     * @var double Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;


    public function __construct()
    {
        $this->customerGroupId = new Identity;
        $this->productId = new Identity;
    }

    /**
     * @param  Identity $customerGroupId Reference to customerGroup
     * @return \jtl\Connector\Model\ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerGroupId(Identity $customerGroupId)
    {
        return $this->setProperty('customerGroupId', $customerGroupId, 'Identity');
    }

    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setProductId(Identity $productId)
    {
        return $this->setProperty('productId', $productId, 'Identity');
    }

    /**
     * @return Identity Reference to product
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param  double $netPrice Price value (net)
     * @return \jtl\Connector\Model\ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setNetPrice($netPrice)
    {
        return $this->setProperty('netPrice', $netPrice, 'double');
    }

    /**
     * @return double Price value (net)
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param  double $quantity Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     * @return \jtl\Connector\Model\ProductPrice
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('quantity', $quantity, 'double');
    }

    /**
     * @return double Optional quantity to apply netPrice for. Default 1 for default price. A quantity value of 3 means that the given product price will be applied when a customer buys 3 or more items. 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

 
}
