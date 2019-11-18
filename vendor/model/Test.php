<?php

namespace vendor\model;

class Test {
    private static $test = 'done';
    public static function my_print()
    {
        echo self::$test;
    }
}