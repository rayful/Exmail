<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/7/3
 * Time: 上午11:33
 */

namespace rayful\Request;


class ModMail extends Email
{

    /**
     * 返回当前的请求是要进行什么操作, 1=DEL, 2=ADD, 3=MOD
     * @return string
     */
    public function getAction()
    {
        return 3;
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
    }
}