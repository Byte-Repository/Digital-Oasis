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

namespace KadenceWP\KadenceBlocks\Symfony\Contracts\HttpClient\Exception;

/**
 * When a 3xx response is returned and the "max_redirects" option has been reached.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface RedirectionExceptionInterface extends HttpExceptionInterface
{
}
