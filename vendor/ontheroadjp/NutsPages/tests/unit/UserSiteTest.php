<?php
namespace Ontheroadjp\NutsPages\Test;

use Ontheroadjp\Utilities\Test\TestCase;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamWrapper;

use Ontheroadjp\NutsPages\Models\UserSite;
use Ontheroadjp\Utilities\File\FileUtilities;

class UserSiteTest extends TestCase
{
	private $root;
	private $rootPath;
	private $publicDirPath;
	private $editDirPath;
	private $htmlTemplatesDirPath;
	private $site;

    public function setUp(){
        parent::setUp();

		// make root
		// @see http://vfs.bovigo.org/apidoc/classes/org.bovigo.vfs.vfsStream.html#setup
		vfsStream::setup();
		$this->root = vfsStreamWrapper::getRoot();
		$this->rootPath = vfsStream::url($this->root->getName().DIRECTORY_SEPARATOR);

		// set edit_dir_path
		$this->editDirPath = $this->rootPath.'edit_dir';
		$this->publicDirPath = $this->rootPath.'public_dir';
		$this->htmlTemplatesDirPath = $this->rootPath.'html_templates_dir';
		
		// create UserSite object
		$attributes = [
			'edit_dir' => $this->editDirPath,
			'public_dir' => $this->publicDirPath,
			'html_templates_dir' => $this->htmlTemplatesDirPath,
		];
		$this->site = new UserSite($attributes);
		
		// vfs://html_templates_dir/ の作成
		$dir = vfsStream::newDirectory('html_templates_dir');
		$this->root->addChild($dir);

		// vfs://html_templates_dir/index.php の作成
		$dir->addChild(vfsStream::newFile('index.php'));
		
		// vfs://html_templates_dir/business/ の作成
		$subDir = vfsStream::newDirectory('business');
		$dir->addChild($subDir);
		
		// vfs://html_templates_dir/business/index.php の作成
		$subDir->addChild(vfsStream::newFile('index.php'));
	
    }

	public function testSetup()
	{
		// UserSite オブジェクトの確認
		$this->assertEquals($this->editDirPath,$this->site->getEditDir());
		$this->assertEquals($this->publicDirPath,$this->site->getPublicDir());
		$this->assertEquals($this->htmlTemplatesDirPath,$this->site->getHtmlTemplatesDir());

		// root ディレクトリの確認
		$this->assertTrue(is_dir($this->rootPath));

		// edit_dir ディレクトリの不存在の確認
		$this->assertFalse(is_dir(vfsStream::url('edit_dir')));
		$this->assertFalse(is_file(vfsStream::url('edit_dir/index.php')));

		// public_dir ディレクトリの不存在の確認
		$this->assertFalse(is_dir(vfsStream::url('public_dir')));
		$this->assertFalse(is_file(vfsStream::url('public_dir/index.php')));

		// html_templates_dir ディレクトリの存在の確認
		$this->assertTrue(is_dir(vfsStream::url('html_templates_dir')));
		$this->assertTrue(is_dir(vfsStream::url('html_templates_dir/business')));
		$this->assertTrue(is_file(vfsStream::url('html_templates_dir/index.php')));
		$this->assertTrue(is_file(vfsStream::url('html_templates_dir/business/index.php')));
	}


    /**
     * A functional test of the createEditDirectory().
     *
     * @return void
     */
    public function testCreateEditDirectory()
	{
		$this->assertTrue($this->site->createEditDirectory());
		$this->assertTrue(is_dir(vfsStream::url('edit_dir')));
		$this->assertTrue(is_file(vfsStream::url('edit_dir/index.php')));
	}

	/**
	 * A functional test of the removeEditDirectory().
	 *
	 * @return void
	 */
	public function testRemoveEditDirectory()
	{
		$this->assertTrue($this->site->createEditDirectory());
		$this->assertTrue($this->site->removeEditDirectory());
		$this->assertFalse(is_dir(vfsStream::url('edit_dir')));	
		$this->assertFalse(is_file(vfsStream::url('edit_dir/index.php')));	
	}

	/**
	 * A functional test of the createPublicDirectory().
	 *
	 * @return void
	 */
	public function testCreatePublicDirectory()
	{
		$this->assertFalse(file_exists(vfsStream::url('public_dir/index.php')));	
		$this->assertTrue($this->site->createPublicDirectory());
		$this->assertTrue(file_exists(vfsStream::url('public_dir/index.php')));	
	}

	/**
	 * A functional test of the removeEditDirectory().
	 *
	 * @return void
	 */
	public function testRemovePublicDirectory()
	{
		$this->assertFalse(file_exists(vfsStream::url('public_dir/index.php')));	
		$this->assertTrue($this->site->createPublicDirectory());
		$this->assertTrue(file_exists(vfsStream::url('public_dir/index.php')));	
		$this->assertTrue($this->site->removePublicDirectory());
		$this->assertFalse(file_exists(vfsStream::url('public_dir/index.php')));	
		
	}

}

?>

