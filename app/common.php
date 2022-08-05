<?php
// 应用公共文件

define('GB_CONF_FILE', "conf.yaml");
define('GB_DATA_CACHE_TIME', 60 * 60);
define('GB_PAGE_CACHE_TIME', 30 * 60);
define('GB_SITE_DIR', "./public/_site");


define('GB_BLOG_CACHE', "all_blog.gb");
define('GB_TAG_CACHE', "all_tag.gb");
define('GB_CATEGORY_CACHE', "all_category.gb");
define('GB_ARCHIVE_CACHE', "all_archive.gb");

define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);


if (!function_exists('write_file')) {
    /**
     * Write File
     *
     * Writes data to the file specified in the path.
     * Creates a new file if non-existent.
     *
     * @param string $path File path
     * @param string $data Data to write
     * @param string $mode fopen() mode (default: 'wb')
     */
    function write_file(string $path, string $data, string $mode = 'wb'): bool
    {
        try {
            $fp = fopen($path, $mode);

            flock($fp, LOCK_EX);

            for ($result = $written = 0, $length = strlen($data); $written < $length; $written += $result) {
                if (($result = fwrite($fp, substr($data, $written))) === false) {
                    break;
                }
            }

            flock($fp, LOCK_UN);
            fclose($fp);

            return is_int($result);
        } catch (Throwable $e) {
            return false;
        }
    }
}

if (!function_exists('get_dir_file_info')) {
    /**
     * Get Directory File Information
     *
     * Reads the specified directory and builds an array containing the filenames,
     * filesize, dates, and permissions
     *
     * Any sub-folders contained within the specified path are read as well.
     *
     * @param string $sourceDir Path to source
     * @param bool $topLevelOnly Look only at the top level directory specified?
     * @param bool $recursion Internal variable to determine recursion status - do not use in calls
     */
    function get_dir_file_info(string $sourceDir, bool $topLevelOnly = true, bool $recursion = false): array
    {
        static $fileData = [];
        $relativePath = $sourceDir;

        try {
            $fp = opendir($sourceDir);

            // reset the array and make sure $source_dir has a trailing slash on the initial call
            if ($recursion === false) {
                $fileData = [];
                $sourceDir = rtrim(realpath($sourceDir), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
            }

            // Used to be foreach (scandir($source_dir, 1) as $file), but scandir() is simply not as fast
            while (false !== ($file = readdir($fp))) {
                if (is_dir($sourceDir . $file) && $file[0] !== '.' && $topLevelOnly === false) {
                    get_dir_file_info($sourceDir . $file . DIRECTORY_SEPARATOR, $topLevelOnly, true);
                } elseif ($file[0] !== '.') {
                    $fileData[$file] = get_file_info($sourceDir . $file);
                    $fileData[$file]['relative_path'] = $relativePath;
                }
            }

            closedir($fp);

            return $fileData;
        } catch (Throwable $fe) {
            return [];
        }
    }
}

if (!function_exists('get_file_info')) {
    /**
     * Get File Info
     *
     * Given a file and path, returns the name, path, size, date modified
     * Second parameter allows you to explicitly declare what information you want returned
     * Options are: name, server_path, size, date, readable, writable, executable, fileperms
     * Returns false if the file cannot be found.
     *
     * @param string $file Path to file
     * @param mixed $returnedValues Array or comma separated string of information returned
     *
     * @return array|null
     */
    function get_file_info(string $file, $returnedValues = ['name', 'server_path', 'size', 'date'])
    {
        if (!is_file($file)) {
            return null;
        }

        $fileInfo = [];

        if (is_string($returnedValues)) {
            $returnedValues = explode(',', $returnedValues);
        }

        foreach ($returnedValues as $key) {
            switch ($key) {
                case 'name':
                    $fileInfo['name'] = basename($file);
                    break;

                case 'server_path':
                    $fileInfo['server_path'] = $file;
                    break;

                case 'size':
                    $fileInfo['size'] = filesize($file);
                    break;

                case 'date':
                    $fileInfo['date'] = filemtime($file);
                    break;

                case 'readable':
                    $fileInfo['readable'] = is_readable($file);
                    break;

                case 'writable':
                    $fileInfo['writable'] = is_really_writable($file);
                    break;

                case 'executable':
                    $fileInfo['executable'] = is_executable($file);
                    break;

                case 'fileperms':
                    $fileInfo['fileperms'] = fileperms($file);
                    break;
            }
        }

        return $fileInfo;
    }
}

if (!function_exists('is_really_writable')) {
    /**
     * Tests for file writability
     *
     * is_writable() returns TRUE on Windows servers when you really can't write to
     * the file, based on the read-only attribute. is_writable() is also unreliable
     * on Unix servers if safe_mode is on.
     *
     * @see https://bugs.php.net/bug.php?id=54709
     *
     * @throws Exception
     *
     * @codeCoverageIgnore Not practical to test, as travis runs on linux
     */
    function is_really_writable(string $file): bool
    {
        // If we're on a Unix server we call is_writable
        if (DIRECTORY_SEPARATOR === '/') {
            return is_writable($file);
        }

        /* For Windows servers and safe_mode "on" installations we'll actually
         * write a file then read it. Bah...
         */
        if (is_dir($file)) {
            $file = rtrim($file, '/') . '/' . bin2hex(random_bytes(16));
            if (($fp = @fopen($file, 'ab')) === false) {
                return false;
            }

            fclose($fp);
            @chmod($file, 0777);
            @unlink($file);

            return true;
        }

        if (!is_file($file) || ($fp = @fopen($file, 'ab')) === false) {
            return false;
        }

        fclose($fp);

        return true;
    }
}