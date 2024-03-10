<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace KadenceWP\KadenceBlocks\Symfony\Contracts\Service;

/**
 * A ServiceSubscriber exposes its dependencies via the static {@link getSubscribedServices} method.
 *
 * The getSubscribedServices method returns an array of service types required by such instances,
 * optionally keyed by the service names used internally. Service types that start with an interrogation
 * mark "?" are optional, while the other ones are mandatory service dependencies.
 *
 * The injected service locators SHOULD NOT allow access to any other services not specified by the method.
 *
 * It is expected that ServiceSubscriber instances consume PSR-11-based service locators internally.
 * This interface does not dictate any injection method for these service locators, although constructor
 * injection is recommended.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface ServiceSubscriberInterface
{
    /**
     * Returns an array of service types required by such instances, optionally keyed by the service names used internally.
     *
     * For mandatory dependencies:
     *
     *  * ['logger' => 'KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface'] means the objects use the "logger" name
     *    internally to fetch a service which must implement Psr\Log\LoggerInterface.
     *  * ['loggers' => 'KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface[]'] means the objects use the "loggers" name
     *    internally to fetch an iterable of Psr\Log\LoggerInterface instances.
     *  * ['KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface'] is a shortcut for
     *  * ['KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface' => 'KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface']
     *
     * otherwise:
     *
     *  * ['logger' => '?KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface'] denotes an optional dependency
     *  * ['loggers' => '?KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface[]'] denotes an optional iterable dependency
     *  * ['?KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface'] is a shortcut for
     *  * ['KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface' => '?KadenceWP\KadenceBlocks\Psr\Log\LoggerInterface']
     *
     * @return string[] The required service types, optionally keyed by service names
     */
    public static function getSubscribedServices();
}
