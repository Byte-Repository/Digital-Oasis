<?php
/**
 * @license MIT
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace KadenceWP\KadenceBlocks\Composer\Installers;

class OntoWikiInstaller extends BaseInstaller
{
    /** @var array<string, string> */
    protected $locations = array(
        'extension' => 'extensions/{$name}/',
        'theme' => 'extensions/themes/{$name}/',
        'translation' => 'extensions/translations/{$name}/',
    );

    /**
     * Format package name to lower case and remove ".ontowiki" suffix
     */
    public function inflectPackageVars(array $vars): array
    {
        $vars['name'] = strtolower($vars['name']);
        $vars['name'] = $this->pregReplace('/.ontowiki$/', '', $vars['name']);
        $vars['name'] = $this->pregReplace('/-theme$/', '', $vars['name']);
        $vars['name'] = $this->pregReplace('/-translation$/', '', $vars['name']);

        return $vars;
    }
}
