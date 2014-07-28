﻿<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */

namespace jtl\Connector\Model;

/**
 * .
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class EntityImage extends DataModel
{
    /**
     * @type string 
     */
    protected $_filename = '';

    /**
     * @type Identity 
     */
    protected $_foreignKey = null;

    /**
     * @type Identity 
     */
    protected $_id = null;

    /**
     * @type Identity 
     */
    protected $_masterImageId = null;

    /**
     * @type integer 
     */
    protected $_relationType = 0;

    /**
     * @type integer 
     */
    protected $_sort = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
	);

	/**
	 * @param  Identity $id 
	 * @return \jtl\Connector\Model\EntityImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setId(Identity $id)
	{
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * @param  Identity $foreignKey 
	 * @return \jtl\Connector\Model\EntityImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setForeignKey(Identity $foreignKey)
	{
		
		$this->_foreignKey = $foreignKey;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getForeignKey()
	{
		return $this->_foreignKey;
	}

	/**
	 * @param  Identity $masterImageId 
	 * @return \jtl\Connector\Model\EntityImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
	 */
	public function setMasterImageId(Identity $masterImageId)
	{
		
		$this->_masterImageId = $masterImageId;
		return $this;
	}
	
	/**
	 * @return Identity 
	 */
	public function getMasterImageId()
	{
		return $this->_masterImageId;
	}

	/**
	 * @param  integer $relationType 
	 * @return \jtl\Connector\Model\EntityImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setRelationType($relationType)
	{
		if (!is_integer($relationType))
			throw new InvalidArgumentException('integer expected.');
		$this->_relationType = $relationType;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getRelationType()
	{
		return $this->_relationType;
	}

	/**
	 * @param  string $filename 
	 * @return \jtl\Connector\Model\EntityImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setFilename($filename)
	{
		if (!is_string($filename))
			throw new InvalidArgumentException('string expected.');
		$this->_filename = $filename;
		return $this;
	}
	
	/**
	 * @return string 
	 */
	public function getFilename()
	{
		return $this->_filename;
	}

	/**
	 * @param  integer $sort 
	 * @return \jtl\Connector\Model\EntityImage
	 * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
	 */
	public function setSort($sort)
	{
		if (!is_integer($sort))
			throw new InvalidArgumentException('integer expected.');
		$this->_sort = $sort;
		return $this;
	}
	
	/**
	 * @return integer 
	 */
	public function getSort()
	{
		return $this->_sort;
	}
}
