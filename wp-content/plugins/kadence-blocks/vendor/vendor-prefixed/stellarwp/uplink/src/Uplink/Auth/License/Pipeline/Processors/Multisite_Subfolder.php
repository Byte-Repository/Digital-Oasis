<?php
/**
 * @license GPL-2.0-or-later
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare( strict_types=1 );

namespace KadenceWP\KadenceBlocks\StellarWP\Uplink\Auth\License\Pipeline\Processors;

use Closure;
use KadenceWP\KadenceBlocks\StellarWP\Uplink\Auth\License\Pipeline\Traits\Multisite_Trait;
use KadenceWP\KadenceBlocks\StellarWP\Uplink\Config;

final class Multisite_Subfolder {

	use Multisite_Trait;

	/**
	 * Check if we're using multisite subfolders and if that type of network license is allowed.
	 *
	 * @param  bool $is_multisite_license
	 * @param  Closure  $next
	 *
	 * @return bool
	 */
	public function __invoke( bool $is_multisite_license, Closure $next ): bool {
		if ( is_main_site() ) {
			return $next( $is_multisite_license );
		}

		if ( $this->is_subfolder_install() ) {
			return Config::allows_network_subfolder_license();
		}

		return $next( $is_multisite_license );
	}

}
