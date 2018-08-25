<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

namespace Rebilly;

use BadMethodCallException;
use RuntimeException;
use UnexpectedValueException;

/**
 * APIKEY providers are functions that accept no arguments and return a string.
 *
 */
final class ApiKeyProvider
{
    public const ENV_APIKEY = 'REBILLY_APIKEY';

    public const INI_APIKEY = 'rebilly_apikey';

    public const INI_PROFILE = 'default';

    public const INI_DEFAULT_FILE = '/.rebilly/credentials.ini';

    /**
     * Provider that return APIKEY from environment variable REBILLY_APIKEY.
     *
     * @return callable
     */
    public static function env()
    {
        return function () {
            return getenv(self::ENV_APIKEY);
        };
    }

    /**
     * APIKEY provider that read APIKEY in an ini file stored in the current user's home directory.
     *
     * @param string|null $profile Profile to use. If not specified will use the "default" profile.
     * @param string|null $filename If provided, uses a custom filename rather than looking in the home directory.
     *
     * @return callable
     */
    public static function ini($profile = null, $filename = null)
    {
        $filename = $filename ?: (self::getHomeDir() . self::INI_DEFAULT_FILE);
        $profile = $profile ?: self::INI_PROFILE;

        return function () use ($profile, $filename) {
            if (!is_readable($filename)) {
                throw new RuntimeException("Cannot read credentials from $filename");
            }

            $data = @parse_ini_file($filename, true);

            if ($data === false) {
                throw new UnexpectedValueException("Invalid credentials file: $filename");
            }

            if (!isset($data[$profile])) {
                throw new UnexpectedValueException("'$profile' not found in credentials file");
            }

            if (!isset($data[$profile][self::INI_APIKEY])) {
                throw new UnexpectedValueException('No APIKEY present in INI profile ' . "'$profile' ($filename)");
            }

            return $data[$profile][self::INI_APIKEY];
        };
    }

    /**
     * Gets the environment's HOME directory if available.
     *
     * @return null|string
     */
    private static function getHomeDir()
    {
        // On Linux/Unix-like systems, use the HOME environment variable
        if ($homeDir = getenv('HOME')) {
            return $homeDir;
        }

        // Get the HOMEDRIVE and HOMEPATH values for Windows hosts
        if (($homeDrive = getenv('HOMEDRIVE')) && ($homePath = getenv('HOMEPATH'))) {
            return $homeDrive . $homePath;
        }

        throw new BadMethodCallException('Cannot establish the home directory');
    }
}
