<?php

namespace Huang\HelloWorld\Api;

class Aaa
{
    public function getPost()
    {
        echo __METHOD__;

        echo "<br>";

        var_dump(func_get_args());

        return [];
    }
}