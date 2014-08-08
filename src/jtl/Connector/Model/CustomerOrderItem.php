<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 */

namespace jtl\Connector\Model;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Order item in customer order..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage CustomerOrder
 * 
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderItem extends DataModel
{
    /**
     * @var Identity Optional reference to configItemId (if item is part of a configurable item)
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("configItemId")
     * @Serializer\Accessor(getter="getConfigItemId",setter="setConfigItemId")
     */
    protected $configItemId = null;

    /**
     * @var Identity Reference to customerOrder
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected $customerOrderId = null;

    /**
     * @var Identity Unique customerOrderItem id
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected $id = null;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected $productId = null;

    /**
     * @var Identity Reference to shippingClass
     * @Serializer\Type("jtl\Connector\Model\Identity")
     * @Serializer\SerializedName("shippingClassId")
     * @Serializer\Accessor(getter="getShippingClassId",setter="setShippingClassId")
     */
    protected $shippingClassId = null;

    /**
     * @var string Order item name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected $name = '';

    /**
     * @var double Price (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("price")
     * @Serializer\Accessor(getter="getPrice",setter="setPrice")
     */
    protected $price = 0.0;

    /**
     * @var double Quantity purchased
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected $quantity = 0.0;

    /**
     * @var string Stock keeping Unit (unique item identifier)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sku")
     * @Serializer\Accessor(getter="getSku",setter="setSku")
     */
    protected $sku = '';

    /**
     * @var string Item type e.g. "product" or "shipping"
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected $type = '';

    /**
     * @var string Optional unique Hashsum (if item is part of configurable item
     * @Serializer\Type("string")
     * @Serializer\SerializedName("unique")
     * @Serializer\Accessor(getter="getUnique",setter="setUnique")
     */
    protected $unique = '';

    /**
     * @var double Value added tax
     * @Serializer\Type("double")
     * @Serializer\SerializedName("vat")
     * @Serializer\Accessor(getter="getVat",setter="setVat")
     */
    protected $vat = 0.0;

    /**
     * @var \jtl\Connector\Model\CustomerOrderItemVariation[]
     * @Serializer\Type("array<jtl\Connector\Model\CustomerOrderItemVariation>")
     * @Serializer\SerializedName("variations")
     * @Serializer\AccessType("reflection")
     */
    protected $variations = array();

    public function __construct()
    {
        $this->configItemId = new Identity;
        $this->customerOrderId = new Identity;
        $this->id = new Identity;
        $this->productId = new Identity;
        $this->shippingClassId = new Identity;
    }

    /**
     * @param  Identity $configItemId Optional reference to configItemId (if item is part of a configurable item)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setConfigItemId(Identity $configItemId)
    {
        return $this->setProperty('configItemId', $configItemId, 'Identity');
    }

    /**
     * @return Identity Optional reference to configItemId (if item is part of a configurable item)
     */
    public function getConfigItemId()
    {
        return $this->configItemId;
    }

    /**
     * @param  Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        return $this->setProperty('customerOrderId', $customerOrderId, 'Identity');
    }

    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->customerOrderId;
    }

    /**
     * @param  Identity $id Unique customerOrderItem id
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }

    /**
     * @return Identity Unique customerOrderItem id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  Identity $productId Reference to product
     * @return \jtl\Connector\Model\CustomerOrderItem
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
     * @param  Identity $shippingClassId Reference to shippingClass
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setShippingClassId(Identity $shippingClassId)
    {
        return $this->setProperty('shippingClassId', $shippingClassId, 'Identity');
    }

    /**
     * @return Identity Reference to shippingClass
     */
    public function getShippingClassId()
    {
        return $this->shippingClassId;
    }

    /**
     * @param  string $name Order item name
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }

    /**
     * @return string Order item name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  double $price Price (net)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setPrice($price)
    {
        return $this->setProperty('price', $price, 'double');
    }

    /**
     * @return double Price (net)
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param  double $quantity Quantity purchased
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setQuantity($quantity)
    {
        return $this->setProperty('quantity', $quantity, 'double');
    }

    /**
     * @return double Quantity purchased
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param  string $sku Stock keeping Unit (unique item identifier)
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setSku($sku)
    {
        return $this->setProperty('sku', $sku, 'string');
    }

    /**
     * @return string Stock keeping Unit (unique item identifier)
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param  string $type Item type e.g. "product" or "shipping"
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setType($type)
    {
        return $this->setProperty('type', $type, 'string');
    }

    /**
     * @return string Item type e.g. "product" or "shipping"
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param  string $unique Optional unique Hashsum (if item is part of configurable item
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setUnique($unique)
    {
        return $this->setProperty('unique', $unique, 'string');
    }

    /**
     * @return string Optional unique Hashsum (if item is part of configurable item
     */
    public function getUnique()
    {
        return $this->unique;
    }

    /**
     * @param  double $vat Value added tax
     * @return \jtl\Connector\Model\CustomerOrderItem
     * @throws \InvalidArgumentException if the provided argument is not of type 'double'.
     */
    public function setVat($vat)
    {
        return $this->setProperty('vat', $vat, 'double');
    }

    /**
     * @return double Value added tax
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param  \jtl\Connector\Model\CustomerOrderItemVariation $variations
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function addVariation(\jtl\Connector\Model\CustomerOrderItemVariation $variation)
    {
        $this->variations[] = $variation;
        return $this;
    }
    
    /**
     * @return \jtl\Connector\Model\CustomerOrderItemVariation[]
     */
    public function getVariations()
    {
        return $this->variations;
    }

    /**
     * @return \jtl\Connector\Model\CustomerOrderItem
     */
    public function clearVariations()
    {
        $this->variations = array();
        return $this;
    }

 
}
