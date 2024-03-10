<?php
/**
 * @license MIT
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace KadenceWP\KadenceBlocks\Composer\Installers;

class AglInstaller extends BaseInstaller
{
    /** @var array<string, string> */
    protected $locations = array(
        'module' => 'More/{$name}/',
    );

    /**
     * Format package name to CamelCase
     */
    public function inflectPackageVars(array $vars): array
    {
        $name = preg_replace_callback('/(?:^|_|-)(.?)/', function ($matches) {
            return strtoupper($matches[1]);
        }, $vars['name']);

        if (null === $name) {
            throw new \RuntimeException('Failed to run preg_replace_callback: '.preg_last_error());
        }

        $vars['name'] = $name;

        return $vars;
    }
}
