<?php
/**
 * @license GPL-2.0-only
 *
 * Modified by kadencewp on 07-March-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace KadenceWP\KadenceBlocks\StellarWP\ProphecyMonorepo\Storage\Drivers;

use KadenceWP\KadenceBlocks\StellarWP\ProphecyMonorepo\Storage\Contracts\Storage;
use KadenceWP\KadenceBlocks\StellarWP\ProphecyMonorepo\Storage\Exceptions\NotFoundException;
use KadenceWP\KadenceBlocks\StellarWP\ProphecyMonorepo\Storage\Exceptions\StorageException;
use KadenceWP\KadenceBlocks\Symfony\Component\Filesystem\Exception\IOException;
use KadenceWP\KadenceBlocks\Symfony\Component\Filesystem\Filesystem;

class LocalStorage implements Storage
{
	/**
	 * @readonly
	 *
	 * @var \KadenceWP\KadenceBlocks\Symfony\Component\Filesystem\Filesystem
	 */
	private $filesystem;
	/**
	 * @var string
	 */
	private $storagePath;
	public function __construct(
		Filesystem $filesystem,
		string $storagePath
	) {
		$this->filesystem  = $filesystem;
		$this->storagePath = $storagePath;
		$this->storagePath = rtrim($this->storagePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
	}

	/**
	 * The configured root storage directory.
	 */
	public function path(): string {
		return $this->storagePath;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param mixed $data
	 */
	public function put(string $path, $data): void {
		$path = $this->getPath($path);

		try {
			$this->filesystem->dumpFile($path, $data);
		} catch (IOException $e) {
			throw StorageException::putError($path, $e);
		}
	}

	/**
	 * {@inheritDoc}
	 *
	 * @param mixed $data
	 */
	public function append(string $path, $data): void {
		$path = $this->getPath($path);

		try {
			$this->filesystem->appendToFile($path, $data);
		} catch (IOException $e) {
			throw StorageException::appendError($path, $e);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function get(string $path): string {
		$path = $this->getPath($path);

		if (! is_readable($path)) {
			throw NotFoundException::pathNotFound($path);
		}

		return (string) file_get_contents($path);
	}

	/**
	 * {@inheritDoc}
	 */
	public function has(string $path): bool {
		$path = $this->getPath($path);

		return $this->filesystem->exists($path);
	}

	/**
	 * {@inheritDoc}
	 */
	public function delete(string $path): void {
		$path = $this->getPath($path);

		try {
			$this->filesystem->remove($path);
		} catch (IOException $e) {
			throw StorageException::deleteError($path, $e);
		}
	}

	protected function getPath(string $path): string {
		return $this->storagePath . $path;
	}
}
