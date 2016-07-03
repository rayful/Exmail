<?php
/**
 * Created by PhpStorm.
 * User: kingmax
 * Date: 16/7/3
 * Time: 上午11:48
 */
spl_autoload_register("auto_load");

function auto_load($class_name){
    $class_name = str_replace("rayful\\","",$class_name);
    $class_name = str_replace("\\", "/", $class_name);  //支持命名空间
    $class_path = $class_name.".php";
    require_once __DIR__."./../src/".$class_path;
}

require __DIR__ . './../vendor/autoload.php';
