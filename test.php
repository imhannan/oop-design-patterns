<?php

class Test {
    public static string $variable = 'fuchka';

    public static function getVariable():string{
        if (self::$variable === null){
            self::$variable = 'Hello';
        }

        return self::$variable;
    }
}

echo Test::getVariable();
