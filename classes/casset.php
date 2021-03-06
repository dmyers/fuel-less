<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * FuelPHP LessCSS package implementation. This namespace controls all Google
 * package functionality, including multiple sub-namespaces for the various
 * tools.
 *
 * @author     Kriansa
 * @version    1.0
 * @package    Fuel
 * @subpackage Less
 */
namespace Less;

class Casset extends \Casset\Casset
{
	
	/**
	 * Less
	 *
	 * Compile a less file and add css asset.
	 *
	 * @param string $sheet The script to add
	 * @param string $sheet_min If given, will be used when $min = true
	 *        If omitted, $script will be minified internally
	 * @param string $group The group to add this asset to. Defaults to 'global'
	 */
	public static function less($sheet, $sheet_min = false, $group = 'global')
	{
		$sheets = \Less::compile((array) $sheet);

		foreach ($sheets as $sheet_file) {
			$path_key = \Config::get('less.casset_path_key', false);
			
			if ($path_key) {
				$sheet_file = $path_key . '::' . $sheet_file;
			}
			
			static::css($sheet_file, $sheet_min, $group);
		}
	}
	
}
