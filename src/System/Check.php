<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\System
 */

namespace Jtl\Connector\Core\System;

use Jtl\Connector\Core\Application\Application;
use Jtl\Connector\Core\Exception\MissingRequirementException;

class Check
{
    public static function run()
    {
        // PHP
        if (!version_compare(PHP_VERSION, Application::MIN_PHP_VERSION, '>=')) {
            throw new MissingRequirementException(sprintf('The connector needs at least PHP version %s, %s given', Application::MIN_PHP_VERSION, PHP_VERSION));
        }

        // Zip
        if (!class_exists('ZipArchive')) {
            throw new MissingRequirementException('Class ZipArchive not found. PHP 5 >= 5.2.0, PECL zip >= 1.1.0 installed?');
        }
    }
}
