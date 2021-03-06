<?php
namespace Jtl\Connector\Core\Definition;

final class Action
{
    const PULL = 'pull';
    const PUSH = 'push';
    const DELETE = 'delete';
    const STATISTIC = 'statistic';

    const AUTH = 'auth';
    const ACK = 'ack';
    const CLEAR = 'clear';
    const FEATURES = 'features';
    const FINISH = 'finish';
    const IDENTIFY = 'identify';
    const INIT = 'init';

    /**
     * @var string[]|null
     */
    protected static $actions = null;

    /**
     * @var string[]
     */
    protected static $coreActions = [
        self::AUTH,
        self::ACK,
        self::CLEAR,
        self::FEATURES,
        self::FINISH,
        self::IDENTIFY,
        self::INIT,
    ];

    /**
     * @return integer[]
     * @throws \ReflectionException
     */
    public static function getActions(): array
    {
        if (is_null(self::$actions)) {
            self::$actions = (new \ReflectionClass(self::class))->getConstants();
        }

        return self::$actions;
    }

    /**
     * @param string $actionName
     * @return boolean
     * @throws \ReflectionException
     */
    public static function isAction(string $actionName): bool
    {
        return in_array($actionName, self::getActions(), true);
    }

    /**
     * @param string $actionName
     * @return boolean
     */
    public static function isCoreAction(string $actionName): bool
    {
        return in_array($actionName, self::$coreActions, true);
    }
}
