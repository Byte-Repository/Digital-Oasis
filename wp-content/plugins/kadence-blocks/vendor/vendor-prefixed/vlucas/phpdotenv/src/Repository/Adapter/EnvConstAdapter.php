<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\Dotenv\Repository\Adapter;

use KadenceWP\KadenceBlocks\PhpOption\Option;
use KadenceWP\KadenceBlocks\PhpOption\Some;

final class EnvConstAdapter implements AdapterInterface
{
    /**
     * Create a new env const adapter instance.
     *
     * @return void
     */
    private function __construct()
    {
        //
    }

    /**
     * Create a new instance of the adapter, if it is available.
     *
     * @return \KadenceWP\KadenceBlocks\PhpOption\Option<\Dotenv\Repository\Adapter\AdapterInterface>
     */
    public static function create()
    {
        /** @var \KadenceWP\KadenceBlocks\PhpOption\Option<AdapterInterface> */
        return Some::create(new self());
    }

    /**
     * Read an environment variable, if it exists.
     *
     * @param non-empty-string $name
     *
     * @return \KadenceWP\KadenceBlocks\PhpOption\Option<string>
     */
    public function read(string $name)
    {
        /** @var \KadenceWP\KadenceBlocks\PhpOption\Option<string> */
        return Option::fromArraysValue($_ENV, $name)
            ->filter(static function ($value) {
                return \is_scalar($value);
            })
            ->map(static function ($value) {
                if ($value === false) {
                    return 'false';
                }

                if ($value === true) {
                    return 'true';
                }

                /** @psalm-suppress PossiblyInvalidCast */
                return (string) $value;
            });
    }

    /**
     * Write to an environment variable, if possible.
     *
     * @param non-empty-string $name
     * @param string           $value
     *
     * @return bool
     */
    public function write(string $name, string $value)
    {
        $_ENV[$name] = $value;

        return true;
    }

    /**
     * Delete an environment variable, if possible.
     *
     * @param non-empty-string $name
     *
     * @return bool
     */
    public function delete(string $name)
    {
        unset($_ENV[$name]);

        return true;
    }
}
