<?php
/**
 * @license MIT
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace KadenceWP\KadenceBlocks\Composer\Installers;

/**
 * An installer to handle MODX Evolution specifics when installing packages.
 */
class MODXEvoInstaller extends BaseInstaller
{
    /** @var array<string, string> */
    protected $locations = array(
        'snippet'       => 'assets/snippets/{$name}/',
        'plugin'        => 'assets/plugins/{$name}/',
        'module'        => 'assets/modules/{$name}/',
        'template'      => 'assets/templates/{$name}/',
        'lib'           => 'assets/lib/{$name}/'
    );
}
