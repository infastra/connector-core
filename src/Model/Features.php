<?php
/**
 * @author Immanuel Klinkenberg <immanuel.klinkenberg@jtl-software.com>
 * @copyright 2010-2018 JTL-Software GmbH
 */

namespace Jtl\Connector\Core\Model;

class Features extends AbstractModel
{
    /**
     * @var FeatureEntity[]
     */
    protected $entities = [];

    /**
     * @var FeatureFlag[]
     */
    protected $flags = [];

    /**
     * Features constructor.
     * @param FeatureEntity[] $entities
     * @param FeatureFlag[] $flags
     */
    public function __construct(array $entities = [], array $flags = [])
    {
        $this->setEntities(...$entities);
        $this->setFlags(...$flags);
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function hasEntity(string $name): bool
    {
        return isset($this->entities[$name]);
    }

    /**
     * @param string $name
     * @return FeatureEntity
     */
    public function getEntity(string $name): FeatureEntity
    {
        if ($this->hasEntity($name)) {
            return $this->entities[$name];
        }
    }

    /**
     * @return FeatureEntity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param FeatureEntity ...$entities
     * @return Features
     */
    public function setEntities(FeatureEntity ...$entities): Features
    {
        foreach ($entities as $entity) {
            $this->setEntity($entity);
        }
        return $this;
    }

    /**
     * @param FeatureEntity $entity
     * @return Features
     */
    public function setEntity(FeatureEntity $entity): Features
    {
        $this->entities[$entity->getName()] = $entity;
        return $this;
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function hasFlag(string $name): bool
    {
        return isset($this->flags[$name]);
    }

    /**
     * @param string $name
     * @return FeatureFlag
     */
    public function getFlag(string $name): FeatureFlag
    {
        if ($this->hasFlag($name)) {
            return $this->flags[$name];
        }
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function isFlagActive(string $name): bool
    {
        if ($this->hasFlag($name)) {
            return $this->flags[$name]->isActive();
        }

        return false;
    }

    /**
     * @return FeatureFlag[]
     */
    public function getFlags(): array
    {
        return $this->flags;
    }

    /**
     * @param FeatureFlag ...$flags
     * @return Features
     */
    public function setFlags(FeatureFlag ...$flags): Features
    {
        foreach ($flags as $flag) {
            $this->setFlag($flag);
        }
        return $this;
    }

    /**
     * @param FeatureFlag $flag
     * @return Features
     */
    public function setFlag(FeatureFlag $flag): Features
    {
        $this->flags[$flag->getName()] = $flag;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [
            'entities' => [],
            'flags' => [],
        ];

        foreach ($this->entities as $entity) {
            $data['entities'][$entity->getName()] = $entity->toArray();
        }

        foreach ($this->flags as $flag) {
            $data['flags'][$flag->getName()] = $flag->isActive();
        }

        return $data;
    }

    /**
     * @param FeatureEntity[] $entities
     * @param FeatureFlag[] $flags
     * @return Features
     */
    public static function create(array $entities = [], array $flags = []): Features
    {
        $featureEntities = [];
        foreach ($entities as $name => $methods) {
            $pull = $methods['pull'] ?? false;
            $push = $methods['push'] ?? false;
            $delete = $methods['delete'] ?? false;
            $featureEntities[] = new FeatureEntity($name, $pull, $push, $delete);
        }

        $featureFlags = [];
        foreach ($flags as $name => $value) {
            $featureFlags[] = new FeatureFlag($name, $value);
        }

        return new static($featureEntities, $featureFlags);
    }
}
