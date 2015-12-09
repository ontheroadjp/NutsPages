<?php
namespace Ontheroadjp\Utilities\File;

class FileUtilities
{
	public static function dirCopy($src_dir, $dist_dir)
	{
		try {
			if (is_dir($src_dir)) {
				if (!is_dir($dist_dir)) {
					mkdir($dist_dir);
				}

				if ($dh = opendir($src_dir)) {
					while (($file = readdir($dh)) !== false) {
						if ($file == "." || $file == "..") {
							continue;
						}
						if (is_dir($src_dir."/".$file)) {
							static::dirCopy($src_dir."/". $file, $dist_dir."/".$file);
						}
						else {
							copy($src_dir."/".$file, $dist_dir."/".$file);
						}
					}
					closedir($dh);
				}
			} else {
				return false;
			}
		} catch( Exception $e) {
			$this->operationFailed($e->getMessage());
		}
		return true;
	}

	public static function removeDirectory($dir)
	{
		info('remove_directory: '.$dir);
		try {
			if( file_exists($dir) && is_dir($dir) ) {
				if ($dh = opendir($dir)) {
					while (($file = readdir($dh)) !== false) {
						if ($file == "." || $file == "..") {
							continue;
						}
						if (is_dir($dir.'/'.$file)) {
							static::removeDirectory($dir.'/'.$file);
						} else {
							unlink($dir.'/'.$file);
						}
					}
					rmdir($dir);
					closedir($dh);
				} else {
					return false;
				}
			} else {
				return false;
			}
		} catch( Exception $e ) {
			$this->operationFailed($e->getMessage());
		}
		return true;
	}
}

?>
