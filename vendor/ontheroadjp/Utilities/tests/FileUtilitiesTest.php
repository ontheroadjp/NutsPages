<?php
namespace Ontheroadjp\Utilities;

use Ontheroadjp\Utilities\Test\TestCase;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamWrapper;

use Ontheroadjp\Utilities\File\FileUtilities;

class FileUtilitiesTest extends TestCase
{
	private $root;
	private $rootPath;
	private $primaryDirPath;
	private $secoundaryDirPath;

    public function setUp(){
        parent::setUp();

		// make root
		vfsStream::setup();
		$this->root = vfsStreamWrapper::getRoot();
		$this->rootPath = vfsStream::url($this->root->getName().DIRECTORY_SEPARATOR);

		// set primary_dir path
		$this->primaryDirPath = $this->rootPath.'primary_dir'.DIRECTORY_SEPARATOR;

		// set secoundary_dir path
		$this->secoundaryDirPath = $this->rootPath.'secoundary_dir'.DIRECTORY_SEPARATOR;
    }

	public function testExistRootDir()
	{
		$this->assertTrue(is_dir($this->rootPath));
	}


    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testDirCopy()
	{
		// doesn't exist primary_dir
		$this->assertFalse(FileUtilities::dirCopy($this->primaryDirPath,$this->secoundaryDirPath));
		
		// make secoundary_dir & child_dir
		$this->assertTrue(mkdir($this->primaryDirPath));
		$this->assertTrue(mkdir($this->primaryDirPath.'child_dir'));

		// copy primary_dir to secoundary_dir
		$this->assertTrue(FileUtilities::dirCopy($this->primaryDirPath,$this->secoundaryDirPath));
		$this->assertTrue(is_dir($this->secoundaryDirPath));
		$this->assertTrue(is_dir($this->secoundaryDirPath.'child_dir'));
	}

	public function testRemoveDirectory()
	{
		// doesn't exist primary_dir
		$this->assertFalse(FileUtilities::removeDirectory($this->primaryDirPath));
		
		// make primary_dir & child_dir
		$this->assertTrue(mkdir($this->primaryDirPath));
		$this->assertTrue(mkdir($this->primaryDirPath.'child_dir'));
		$this->assertTrue(is_dir($this->primaryDirPath));
		$this->assertTrue(is_dir($this->primaryDirPath.'child_dir'));

		// remove primary_dir
		$this->assertTrue(FileUtilities::removeDirectory($this->primaryDirPath));
		$this->assertFalse(is_dir($this->primaryDirPath));
		$this->assertFalse(is_dir($this->primaryDirPath.'child_dir'));
    }
}

?>
