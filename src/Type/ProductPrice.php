<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */
namespace Jtl\Connector\Core\Type;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ProductPrice extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('customerGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('customerId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('items', 'Jtl\Connector\Model\ProductPriceItem', null, false, false, true)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
