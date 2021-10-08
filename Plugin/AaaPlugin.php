<?php

namespace Huang\HelloWorld\Plugin;

use Huang\HelloWorld\Controller\Index\Example as ExampleAction;
//use Huang\HelloWorld\Controller\Index\Bbb as ExampleAction;

class AaaPlugin
{
    //前置方法：必须是before开头，+ 运行的方法
    public function beforeSetTitle(ExampleAction $subject, $title)
    {
        $title = $title . ' 来到 ';
        echo __METHOD__ . '</br>';

        //return $title;
        return [$title];
    }

    //后置方法：必须是after开头，+ 运行的方法
    public function afterGetTitle(ExampleAction $subject, $result)
    {
        echo __METHOD__ . '</br>';
        return '<h1>' . $result . '新世界!' . '</h1>';
    }

    //包围方法：必须是around开头，+ 运行的方法
//    public function aroundGetTitle(ExampleAction $subject, callable $proceed)
//    {
//        echo __METHOD__ . ' - proceed() 之前 <br/>';
//        $result = $proceed();
//        echo __METHOD__ . ' - proceed() 之后 <br/>';
//        return $result;
//    }
}