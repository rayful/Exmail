<?php

/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/7/3
 * Time: 上午11:42
 */
class TestFull extends PHPUnit_Framework_TestCase
{
    /**
     * @var \rayful\Exmail
     */
    public $Client;

    public function setUp()
    {
        require __DIR__ . "/autoload.php";
        require __DIR__ . "/config.php";

        $this->Client = new \rayful\Exmail(CLIENT_ID, SECRET);
    }

    public function testGetInfo()
    {
        $result = $this->Client->getInfo("a@xiyanghui.com");
        print_r($result);
    }

    public function testAddMail()
    {
        $Request = new \rayful\Request\AddMail();
        $Request->setAlias("bad@xiyanghui.com");
        $Request->setName("张大成");
        $Request->setGender("女");
        $Request->setPosition("店长");
        $Request->setMobile("18899009988");
        $Request->setExtId("52");
        $Request->setPassword("4400110022");
        $Request->setPartyPath("运营/运营管理");
        $Request->setMd5(false);

        $result = $this->Client->sync($Request);

        $this->assertEquals($result, "");
    }

    public function testMorePartyPath()
    {
        $Request = new \rayful\Request\ModMail();
        $Request->setAlias("bad@xiyanghui.com");
        $Request->setPartyPath(
            ["运营/淘宝店长","运营/运营管理"]
        );  //不成功,不知道什么原因

        $result = $this->Client->sync($Request);

        $this->assertEquals($result, "");
    }

    public function testModMail()
    {
        $Request = new \rayful\Request\ModMail();
        $Request->setAlias("bad@xiyanghui.com");
        $Request->setOpenType(false);

        $result = $this->Client->sync($Request);

        $this->assertEquals($result, "");
    }

    public function testDelMail()
    {
        $Request = new \rayful\Request\DelMail();
        $Request->setAlias("bad@xiyanghui.com");

        $result = $this->Client->sync($Request);

        $this->assertEquals($result, "");
    }
}
