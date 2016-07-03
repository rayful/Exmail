<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/7/3
 * Time: 上午11:08
 */

namespace rayful\Request;


class AddMail extends Email
{

    /**
     * 返回当前的请求是要进行什么操作, 1=DEL, 2=ADD, 3=MOD
     * @return string
     */
    public function getAction()
    {
        return 2;
    }

    /**
     * 验证参数是否设置完成。
     * @throws \Exception
     * @return void
     */
    protected function validate()
    {
        if(!$this->getAlias()){
            throw new \Exception("邮箱名称必须设置。");
        }

        if(!$this->getPassword()){
            throw new \Exception("邮箱密码必须设置。");
        }

        if(is_null($this->getMd5())){
            throw new \Exception("密码格式必须设置。");
        }
        
        if(!$this->getName()){
            throw new \Exception("成员姓名必须设置。");
        }
    }
}