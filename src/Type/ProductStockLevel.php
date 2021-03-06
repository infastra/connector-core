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
class ProductStockLevel extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('stockLevel', 'double', 0.0, false, false, false)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
