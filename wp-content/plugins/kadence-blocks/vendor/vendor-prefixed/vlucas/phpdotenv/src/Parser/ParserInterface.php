<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\Dotenv\Parser;

interface ParserInterface
{
    /**
     * Parse content into an entry array.
     *
     * @param string $content
     *
     * @throws \KadenceWP\KadenceBlocks\Dotenv\Exception\InvalidFileException
     *
     * @return \KadenceWP\KadenceBlocks\Dotenv\Parser\Entry[]
     */
    public function parse(string $content);
}
