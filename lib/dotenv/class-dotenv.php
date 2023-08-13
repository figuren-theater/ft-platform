<?php
/**
 * Prepare environment variables from .env file
 *
 * @source  https://dev.to/fadymr/php-create-your-own-php-dotenv-3k2i
 */

namespace DevCoder;

/**
 * DotEnv Class.
 *
 * Provides functionality to load configuration variables from a file and set environment variables.
 */
class DotEnv {
	/**
	 * The directory where the .env file can be located.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * Constructor for the class.
	 *
	 * Initializes a new instance of the class with the specified file path.
	 * If the file does not exist, an InvalidArgumentException is thrown.
	 *
	 * @param string $path The path to the configuration file.
	 *
	 * @throws \InvalidArgumentException If the specified file does not exist.
	 */
	public function __construct( string $path ) {
		if ( ! file_exists( $path ) ) {
			throw new \InvalidArgumentException( sprintf( '%s does not exist', $path ) );
		}
		$this->path = $path;
	}

	/**
	 * Load configuration variables from a file and set environment variables.
	 *
	 * This method reads a file line by line, parses each line, and sets environment variables based on the content of the file.
	 * The file path is specified by the `$this->path` property.
	 * If the file is not readable, a RuntimeException is thrown.
	 *
	 * @throws \RuntimeException If the configuration file is not readable.
	 *
	 * @return void
	 */
	public function load() :void {
		if ( ! is_readable( $this->path ) ) {
			throw new \RuntimeException( sprintf( '%s file is not readable', $this->path ) );
		}

		$lines = file( $this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
		foreach ( $lines as $line ) {

			if ( strpos( trim( $line ), '#' ) === 0 ) {
				continue;
			}

			list($name, $value) = explode( '=', $line, 2 );
			$name = trim( $name );
			$value = trim( $value );

			if ( ! array_key_exists( $name, $_SERVER ) && ! array_key_exists( $name, $_ENV ) ) {
				putenv( sprintf( '%s=%s', $name, $value ) ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.runtime_configuration_putenv
				$_ENV[ $name ] = $value;
				$_SERVER[ $name ] = $value;
			}
		}
	}
}
