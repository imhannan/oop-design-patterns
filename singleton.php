<?php

final class Singleton
{
    private static self $instance;

    private function __construct()
    {

    }

    public static function getInstance():self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function sayHi()
    {
        echo 'Hi'.PHP_EOL;
    }

    private function __clone()
    {

    }

    public function __wakeup()
    {

    }
}

$singleton = Singleton::getInstance();

$singleton->sayHi();