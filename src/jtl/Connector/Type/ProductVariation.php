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
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('productId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('cName', 'string', '', false, false, false),
			new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductVariationI18n', null, false, false, true),
			new PropertyInfo('invisibilities', '\jtl\Connector\Model\ProductVariationInvisibility', null, false, false, true),
			new PropertyInfo('isActive', 'boolean', false, false, false, false),
			new PropertyInfo('isSelectable', 'boolean', false, false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
			new PropertyInfo('type', 'string', '', false, false, false),
			new PropertyInfo('values', '\jtl\Connector\Model\ProductVariationValue', null, false, false, true),
        );
    }
}