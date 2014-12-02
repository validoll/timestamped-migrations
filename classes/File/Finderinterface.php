<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Interface of finder class
 *
 * @author	Vyacheslav Malchik <validoll-ru@yandex.ru>
 * @copyright	(c) 2014
 * @license	http://www.opensource.org/licenses/isc-license.txt
 */
interface File_Finderinterface {
	/**
	 * Find file by name without extension
	 *
	 * @param string $filename Name of the file
	 * @return mixed Return FALSE if file not found or  of path of file found
	 */
	public function find($filename);

	/**
	 * Find files in directory
	 *
	 * @param string $dir Directory path
	 * @return mixed Return FALSE if files not found or of path of files found
	 */
	public function findAll($dir = null);
}
