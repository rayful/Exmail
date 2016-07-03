<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/7/3
 * Time: 上午11:09
 */

namespace rayful\Request;


/**
 * Class Email
 * @package rayful\Request
 */
abstract class Email
{
    /**
     * 帐号名,帐号名为邮箱格式
     * @var string
     */
    private $Alias;

    /**
     * 姓名
     * @var string
     */
    private $Name;

    /**
     * 性别:1=男,2=女
     * @var string
     */
    private $Gender;

    /**
     * 职位
     * @var string
     */
    private $Position;

    /**
     * 联系电话
     * @var string
     */
    private $Tel;

    /**
     * 手机
     * @var string
     */
    private $Mobile;

    /**
     * 编号(工号)
     * @var string
     */
    private $ExtId;

    /**
     * 密码
     * @var string
     */
    private $Password;

    /**
     * 是否为 Md5 密码,0=明文密码,1=Md5 密 码
     * @var string
     */
    private $Md5;

    /**
     * 所属部门
     * 1、传部门路径,用’/’分隔
     * 2、根部门不需要传。如果空,则为根部门。 部门是 已存在的
     * 3、如果是多个部门,传多个PartyPath
     * @var
     */
    private $PartyPath;

    /**
     * 别名列表
     * 1. 如果多个别名,传多个 Slave
     * 2. Slave 上限为 5 个
     * 3. Slave 为邮箱格式
     * @var string
     */
    private $Slave;

    /**
     * 0=不设置状态,1=启用帐号,2=禁用帐号
     * @var string
     */
    private $OpenType;

    /**
     * 返回当前的请求是要进行什么操作, 1=DEL, 2=ADD, 3=MOD
     * @return string
     */
    abstract public function getAction();

    /**
     * 验证参数是否设置完成。
     * @throws \Exception
     * @return void
     */
    abstract protected function validate();
    
    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->Alias;
    }

    /**
     * @param string $Alias
     */
    public function setAlias($Alias)
    {
        $this->Alias = $Alias;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * @param string $Gender
     */
    public function setGender($Gender)
    {
        $this->Gender = $Gender == "男" ? "1" : "2";
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->Position;
    }

    /**
     * @param string $Position
     */
    public function setPosition($Position)
    {
        $this->Position = $Position;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * @param string $Tel
     */
    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->Mobile;
    }

    /**
     * @param string $Mobile
     */
    public function setMobile($Mobile)
    {
        $this->Mobile = $Mobile;
    }

    /**
     * @return string
     */
    public function getExtId()
    {
        return $this->ExtId;
    }

    /**
     * @param string $ExtId
     */
    public function setExtId($ExtId)
    {
        $this->ExtId = $ExtId;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return string
     */
    public function getMd5()
    {
        return $this->Md5;
    }

    /**
     * @param boolean $Md5
     */
    public function setMd5($Md5)
    {
        $this->Md5 = $Md5 ? "1" : "0";
    }

    /**
     * @return mixed
     */
    public function getPartyPath()
    {
        return $this->PartyPath;
    }

    /**
     * @param mixed $PartyPath
     */
    public function setPartyPath($PartyPath)
    {
        $this->PartyPath = $PartyPath;
    }

    /**
     * @return string
     */
    public function getSlave()
    {
        return $this->Slave;
    }

    /**
     * @param string $Slave
     */
    public function setSlave($Slave)
    {
        $this->Slave = $Slave;
    }

    /**
     * @return string
     */
    public function getOpenType()
    {
        return $this->OpenType;
    }

    /**
     * @param boolean $OpenType
     */
    public function setOpenType($OpenType)
    {
        $this->OpenType = $OpenType ? "1" : "2";
    }

    public function toArray()
    {
        $data['Action'] = $this->getAction();
        $this->validate();
        
        foreach ($this as $key => $value) {
            if (!is_null($value)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }

}