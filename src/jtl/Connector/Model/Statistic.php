<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Statistic Model
 * @access public
 */
class Statistic extends DataModel
{
    /**
     * @var int
     */
    protected $_count;

    /**
     * @var string
     */
    protected $_controllerName;

    /**
     * Statistic Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }

        switch ($name) {
            case "_count":
            
                $this->$name = (int)$value;
                break;

            case "_controllerName":

                $this->$name = $value;
                break;
        }
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>