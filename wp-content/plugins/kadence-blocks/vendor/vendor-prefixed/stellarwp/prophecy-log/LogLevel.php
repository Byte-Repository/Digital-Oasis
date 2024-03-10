<?php
/**
 * @license GPL-2.0-only
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\StellarWP\ProphecyMonorepo\Log;

use UnhandledMatchError;

/**
 * A wrapper implementation for getting Monolog
 * levels.
 */
final class LogLevel
{
	/**
	 * Detailed debug information
	 */
	public const DEBUG = 100;

	/**
	 * Interesting events
	 *
	 * Examples: User logs in, SQL logs.
	 */
	public const INFO = 200;

	/**
	 * Uncommon events
	 */
	public const NOTICE = 250;

	/**
	 * Exceptional occurrences that are not errors
	 *
	 * Examples: Use of deprecated APIs, poor use of an API,
	 * undesirable things that are not necessarily wrong.
	 */
	public const WARNING = 300;

	/**
	 * Runtime errors
	 */
	public const ERROR = 400;

	/**
	 * Critical conditions
	 *
	 * Example: Application component unavailable, unexpected exception.
	 */
	public const CRITICAL = 500;

	/**
	 * Action must be taken immediately
	 *
	 * Example: Entire website down, database unavailable, etc.
	 * This should trigger the SMS alerts and wake you up.
	 */
	public const ALERT = 550;

	/**
	 * Urgent alert.
	 */
	public const EMERGENCY = 600;

	/**
	 * Get a Monolog log level code from a name.
	 *
	 * @param string $level The log level.
	 *
	 * @throws UnhandledMatchError
	 *
	 * @return int The Monolog level code.
	 */
	public static function fromName(string $level): int {
		switch ($level) {
			default:
				throw new UnhandledMatchError($level);
			case 'debug':
			case 'Debug':
			case 'DEBUG':
				return self::DEBUG;
			case 'info':
			case 'Info':
			case 'INFO':
				return self::INFO;
			case 'notice':
			case 'Notice':
			case 'NOTICE':
				return self::NOTICE;
			case 'warning':
			case 'Warning':
			case 'WARNING':
				return self::WARNING;
			case 'error':
			case 'Error':
			case 'ERROR':
				return self::ERROR;
			case 'critical':
			case 'Critical':
			case 'CRITICAL':
				return self::CRITICAL;
			case 'alert':
			case 'Alert':
			case 'ALERT':
				return self::ALERT;
			case 'emergency':
			case 'Emergency':
			case 'EMERGENCY':
				return self::EMERGENCY;
		}
	}

	/**
	 * Returns the PSR-3 level matching the Monolog level code.
	 *
	 *
	 * @throws UnhandledMatchError
	 *
	 * @phpstan-return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::*
	 */
	public static function toPsrLogLevel(int $level): string {
		switch ($level) {
			default:
				throw new UnhandledMatchError((string) $level);
			case self::DEBUG:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::DEBUG;
			case self::INFO:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::INFO;
			case self::NOTICE:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::NOTICE;
			case self::WARNING:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::WARNING;
			case self::ERROR:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::ERROR;
			case self::CRITICAL:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::CRITICAL;
			case self::ALERT:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::ALERT;
			case self::EMERGENCY:
				return \KadenceWP\KadenceBlocks\Psr\Log\LogLevel::EMERGENCY;
		}
	}
}
