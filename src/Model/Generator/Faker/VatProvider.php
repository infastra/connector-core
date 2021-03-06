<?php
namespace Jtl\Connector\Core\Model\Generator\Faker;

use Faker\Provider\Base;

/**
 * Class VatProvider
 * @package Jtl\Connector\Core\Model\Generator\Faker
 */
class VatProvider extends Base
{
    /**
     * @param bool $spacedNationalPrefix
     * @return string
     */
    public function vat(bool $spacedNationalPrefix = false): string
    {
        $prefix = $spacedNationalPrefix ? "DE " : "DE";

        return sprintf("%s%d", $prefix, self::randomNumber(9, true));
    }
}
