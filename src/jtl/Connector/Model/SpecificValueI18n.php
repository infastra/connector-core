<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * SpecificValueI18n Model
 * @access public
 */
abstract class SpecificValueI18n extends DataModel
{
    /**
     * @var string
     */
    protected $_languageIso;
    
    /**
     * @var int
     */
    protected $_specificValueId = 0;
    
    /**
     * @var string
     */
    protected $_value;
    
    /**
     * @var string
     */
    protected $_url;
    
    /**
     * @var string
     */
    protected $_description;
    
    /**
     * @var string
     */
    protected $_metaDescription;
    
    /**
     * @var string
     */
    protected $_metaKeywords;
    
    /**
     * @var string
     */
    protected $_titleTag;
    
    /**
     * SpecificValueI18n Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case "_languageIso":
            case "_value":
            case "_url":
            case "_description":
            case "_metaDescription":
            case "_metaKeywords":
            case "_titleTag":
            
                $this->$name = (string)$value;
                break;
        
            case "_specificValueId":
            
                $this->$name = (int)$value;
                break;
        
        }
    }
    
    /**
     * SpecificValueI18n Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        return $this->$name;
    }
}
?>