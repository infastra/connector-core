<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('crossSellingGroupId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('crossSellingProductId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('productId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('nEigenesFeld', 'integer', 0, false, false, false),
        );
    }
}