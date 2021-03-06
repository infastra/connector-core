<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Utilities
 */
namespace Jtl\Connector\Core\Definition;

use Jtl\Connector\Core\Rpc\Method;

/**
 * Rpc Method Utilities
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
final class RpcMethod
{
    const ACK = 'core.connector.ack';
    const AUTH = 'core.connector.auth';
    const CLEAR = 'core.linker.clear';
    const INIT = 'core.connector.init';
    const FEATURES = 'core.connector.features';
    const IDENTIFY = 'connector.identify';
    const FINISH = 'connector.finish';

    protected static $mappedMethods = [
        self::IDENTIFY => 'core.connector.identify',
        self::FINISH => 'core.connector.finish',
        self::CLEAR => 'core.connector.clear',
        'CustomerOrder.statistic' => 'customer_order.statistic',
    ];

    /**
     * @param string $methodName
     * @return boolean
     */
    public static function isMethod(string $methodName): bool
    {
        $pregcore = "";
        if (strpos($methodName, "core.") !== false) {
            $pregcore = "core.";
        }
        
        if (preg_match("/{$pregcore}[a-z0-9]{3,}[.]{1}[a-z0-9]{3,}/", $methodName) === 1) {
            return true;
        }
        
        return false;
    }

    /**
     * @param $method
     * @return string
     */
    public static function mapMethod($method): string
    {
        return self::$mappedMethods[$method] ?? $method;
    }
}
