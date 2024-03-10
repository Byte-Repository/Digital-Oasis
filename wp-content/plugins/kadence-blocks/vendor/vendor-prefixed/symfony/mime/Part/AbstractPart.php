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

namespace KadenceWP\KadenceBlocks\Symfony\Component\Mime\Part;

use KadenceWP\KadenceBlocks\Symfony\Component\Mime\Header\Headers;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class AbstractPart
{
    private $headers;

    public function __construct()
    {
        $this->headers = new Headers();
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    public function getPreparedHeaders(): Headers
    {
        $headers = clone $this->headers;
        $headers->setHeaderBody('Parameterized', 'Content-Type', $this->getMediaType().'/'.$this->getMediaSubtype());

        return $headers;
    }

    public function toString(): string
    {
        return $this->getPreparedHeaders()->toString()."\r\n".$this->bodyToString();
    }

    public function toIterable(): iterable
    {
        yield $this->getPreparedHeaders()->toString();
        yield "\r\n";
        yield from $this->bodyToIterable();
    }

    public function asDebugString(): string
    {
        return $this->getMediaType().'/'.$this->getMediaSubtype();
    }

    abstract public function bodyToString(): string;

    abstract public function bodyToIterable(): iterable;

    abstract public function getMediaType(): string;

    abstract public function getMediaSubtype(): string;
}
