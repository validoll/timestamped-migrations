<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * File finder through native glob() PHP function.
 *
 * @author	Vyacheslav Malchik <validoll-ru@yandex.ru>
 * @copyright	(c) 2014
 * @license	http://www.opensource.org/licenses/isc-license.txt
 */
class File_Finder_Native implements File_Finderinterface {
	/**
	 * Find file by name without extension
	 *
	 * @param string $filename Name of the file
	 * @return mixed Return FALSE if file not found or of path of file found
	 */
	public function find($filename) {
		$file = glob(sprintf($this->config['path'] . DIRECTORY_SEPARATOR . '%d_*'.EXT, $version));
		return $file;
	}

	/**
	 * Find files in directory
	 *
	 * @param string $dir Directory path
	 * @return mixed Return FALSE if files not found or of path of files found
	 */
	public function findAll($dir = null) {
		$files = glob($this->config['path'].DIRECTORY_SEPARATOR .'*'.EXT);
		return $files;
	}
}
