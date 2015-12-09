<?php

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'vfsStream/vfsStream.php';
// require_once 'hoge.php';

/**
 * ファイルシステムのテストに関してはURL参照
 * とりあえずざっくり使う方法メモ
 * @see http://www.phpunit.de/manual/3.6/ja/test-doubles.html#test-doubles.mocking-the-filesystem.examples.ExampleTest.php
 * @see http://tech.vg.no/2011/03/09/mocking-the-file-system-using-phpunit-and-vfsstream/
 */
class HogeTest extends PHPUnit_Framework_TestCase{

    private $root;
    private $rootPath;

    public function setup(){
        vfsStream::setup();
        $this->root = vfsStreamWrapper::getRoot();
        // 毎度呼ぶのが面倒なので
        $this->rootPath = vfsStream::url($this->root->getName().DIRECTORY_SEPARATOR);
    }

    public function tearDown(){

    }

    public function testファイルの存在確認(){
        // ルートディレクトリの確認
        $this->assertTrue(is_dir($this->rootPath));

        $file = vfsStream::newFile("hoge.txt");
        // ファイルの登録と思えば良い これで vfs://root/hoge.txt が存在することになる
        $this->root->addChild($file);
        // ファイル存在の確認
        $this->assertTrue(is_file($this->rootPath.$file->getName()));
        $this->assertTrue(file_exists($this->rootPath.$file->getName()));
    }

    public function testファイルOpenClose(){
        $file = vfsStream::newFile("hoge.txt");
        $this->root->addChild($file);
        $fileHandle = fopen($this->rootPath.$file->getName(),"w+");
        $this->assertNotNull($fileHandle);
        $this->assertTrue(fclose($fileHandle));
    }

    public function testファイル書き込み(){
        $file = vfsStream::newFile("hoge.txt");
        $this->root->addChild($file);

        // 書き込み
        $fileHandle = fopen($this->rootPath.$file->getName(),"w+");
        fwrite($fileHandle,"hoge");
        fclose($fileHandle);

        // 内容確認
        $file->seek(0, 0);
        $this->assertEquals("hoge", $file->readUntilEnd());
        $file->seek(0, 0);
        $this->assertEquals(0, $file->getBytesRead());
        $this->assertEquals("ho", $file->read(2));
        $this->assertEquals("ge", $file->read(2));
        $this->assertEquals(4, $file->getBytesRead());
    }

    public function testファイル書き込み2(){
        $file = vfsStream::newFile("hoge.txt");
        $this->root->addChild($file);
        // 事前にファイル内容を登録
        $file->setContent("hoge");

        // 追記でOpen
        $fileHandle = fopen($this->rootPath.$file->getName(),"a+");
        fwrite($fileHandle,"hoge");
        fclose($fileHandle);

        // 内容確認
        $file->seek(0, 0);
        $this->assertEquals("hogehoge", $file->readUntilEnd());
        $file->seek(0, 0);
        $this->assertEquals(0, $file->getBytesRead());
        $this->assertEquals("hoge", $file->read(4));
        $this->assertEquals("hoge", $file->read(4));
        $this->assertEquals(8, $file->getBytesRead());
    }

    public function testファイル読み込み(){
        $file = vfsStream::newFile("hoge.txt");
        $this->root->addChild($file);
        $file->setContent("hogehoge");

        $filePath = $this->rootPath.$file->getName();
        $this->assertEquals(8,filesize($filePath));
        $this->assertEquals("hogehoge", file_get_contents($filePath));
    }
}
?>