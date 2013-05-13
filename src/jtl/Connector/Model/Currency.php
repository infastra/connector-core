<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Currency Model
 * @access public
 */
abstract class Currency extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_iso;
    
    /**
     * @var string
     */
    protected $_nameHtml;
    
    /**
     * @var double
     */
    protected $_factor;
    
    /**
     * @var string
     */
    protected $_default = "False";
    
    /**
     * @var string
     */
    protected $_currencySignBeforeValue = "False";
    
    /**
     * @var string
     */
    protected $_delimiterCent = ",";
    
    /**
     * @var string
     */
    protected $_delimiterThousand = ".";
    
    /**
     * Currency Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_id":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_iso":
            case "_nameHtml":
            case "_default":
            case "_currencySignBeforeValue":
            case "_delimiterCent":
            case "_delimiterThousand":
            
                $this->$name = (string)$value;
                break;
        
            case "_factor":
            
                $this->$name = (double)$value;
                break;
        
        }
    }
    
    /**
     * Currency Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>