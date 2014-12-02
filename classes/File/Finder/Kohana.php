<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * File finder through Kohana framework functions use cascading filesystem
 *
 * @author	Vyacheslav Malchik <validoll-ru@yandex.ru>
 * @copyright	(c) 2014
 * @license	http://www.opensource.org/licenses/isc-license.txt
 */
class File_Finder_Kohana implements File_Finderinterface {

	/**
	 * Cascading system directory with files
	 *
	 * @var string
	 */
	protected $_dir;

	public function dir($dir = null) {
		if (empty($this->_dir))
		{
			if (empty($dir))
			{
				$config = Kohana::$config->load('migrations')->as_array();
				$this->_dir = $config['dir'];
			}
			else
			{
				$this->_dir = $dir;
			}
		}
		return $this->_dir;
	}

	/**
	 * Get folders in cascading filesystem
	 *
	 * @return array
	 */
	public function get_migration_folders()
	{
		if (empty($this->migrations_folders))
		{
			$migrations = Kohana::list_files($this->dir());
			foreach ($migrations as $migration)
			{
				$this->migrations_folders[] = dirname($migration);
			}
		}
		return $this->migrations_folders;
	}

	/**
	 * Find file by name without extension
	 *
	 * @param string $filename Name of the file
	 * @return mixed Return FALSE if file not found or  of path of file found
	 */
	public function find($filename) {
		$file = FALSE;
		$migrations = Kohana::list_files($this->dir());
		$folders = static::get_migration_folders();
		foreach($folders as $folder)
		{
		    var_dump(sprintf($folder.DIRECTORY_SEPARATOR.'%d_*'.EXT, $filename));
			$file = glob(sprintf($folder.DIRECTORY_SEPARATOR.'%d_*'.EXT, $filename));
			// Uses the first file found
			if (!empty($file))
			{
				break;
			}
		}
		return $file;
	}

	/**
	 * Find files in directory
	 *
	 * @param string $dir Directory path
	 * @return mixed Return FALSE if files not found or of path of files found
	 */
	public function findAll($dir = null) {
		$files = Kohana::list_files($this->dir());
		return $files;
	}
}
