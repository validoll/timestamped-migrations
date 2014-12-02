<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * File finder help class
 *
 * @author	Vyacheslav Malchik <validoll-ru@yandex.ru>
 * @copyright	(c) 2014
 * @license	http://www.opensource.org/licenses/isc-license.txt
 */
class File_Finder {
	static public function finder() {
		$finder = FALSE;
		if (method_exists('Kohana', 'list_files'))
		{
			$finder = new File_Finder_Kohana();
		}
		else
		{
			$finder = new File_Finder_Native();
		}
		return $finder;
	}
}
