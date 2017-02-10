<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/9
 * Time: 15:40
 */

/**
 * @desc 简单的函数遍历
 */
if( !function_exists('p') ){
    function p($arr){
        header('content-type:text/html;chaeset=utf-8');
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}

/**
 * @desc 获当前Y-m-d H:i:s格式时间
 */
if(!function_exists('getNow'))
{
    function getNow()
    {
        return date("Y-m-d H:i:s");
    }
}

/****
 * @desc 获取当天Y-m-d时间格式时间
 */
if(!function_exists('getToday'))
{
    function getToday()
    {
        return date("Y-m-d");
    }
}