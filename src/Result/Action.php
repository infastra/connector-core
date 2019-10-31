<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Result
 */
namespace Jtl\Connector\Core\Result;

/**
 * Connector Handle Result
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Action
{
    /**
     * Action Result
     *
     * @var mixed
     */
    protected $result;
    
    /**
     * Action Error
     *
     * @var mixed
     */
    protected $error;

    /**
     * Constructor
     *
     * @param mixed $result
     * @param mixed $error
     */
    public function __construct($result = null, $error = null)
    {
        $this->result = $result;
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     * @return Action
     */
    public function setResult($result): Action
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Setter for $_error
     *
     * @param mixed $error
     * @return Action
     */
    public function setError($error): Action
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Return true if an error occurs otherwise false
     *
     * @return boolean
     */
    public function isError(): bool
    {
        return ($this->error !== null);
    }
}
