<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\Dotenv\Repository\Adapter;

final class GuardedWriter implements WriterInterface
{
    /**
     * The inner writer to use.
     *
     * @var \KadenceWP\KadenceBlocks\Dotenv\Repository\Adapter\WriterInterface
     */
    private $writer;

    /**
     * The variable name allow list.
     *
     * @var string[]
     */
    private $allowList;

    /**
     * Create a new guarded writer instance.
     *
     * @param \KadenceWP\KadenceBlocks\Dotenv\Repository\Adapter\WriterInterface $writer
     * @param string[]                                   $allowList
     *
     * @return void
     */
    public function __construct(WriterInterface $writer, array $allowList)
    {
        $this->writer = $writer;
        $this->allowList = $allowList;
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
        // Don't set non-allowed variables
        if (!$this->isAllowed($name)) {
            return false;
        }

        // Set the value on the inner writer
        return $this->writer->write($name, $value);
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
        // Don't clear non-allowed variables
        if (!$this->isAllowed($name)) {
            return false;
        }

        // Set the value on the inner writer
        return $this->writer->delete($name);
    }

    /**
     * Determine if the given variable is allowed.
     *
     * @param non-empty-string $name
     *
     * @return bool
     */
    private function isAllowed(string $name)
    {
        return \in_array($name, $this->allowList, true);
    }
}
